<?php

namespace YukataRm\Laravel\Validation\Facade;

use YukataRm\Laravel\Validation\Interface\ValidationRulesInterface;
use YukataRm\Laravel\Validation\Rules\ValidationRules;

/**
 * Facade Manager
 * 
 * @package YukataRm\Laravel\Validation\Facade
 */
class Manager
{
    /**
     * make Rules instance
     *
     * @param string $key
     * @return \YukataRm\Laravel\Validation\Interface\ValidationRulesInterface
     */
    public function make(string $key): ValidationRulesInterface
    {
        return new ValidationRules($key);
    }

    /**
     * call Validation method
     * 
     * @param string $name
     * @param array<mixed> $arguments
     * @return \YukataRm\Laravel\Validation\Interface\ValidationRulesInterface
     */
    public function __call(string $name, array $arguments): ValidationRulesInterface
    {
        $key = array_shift($arguments);

        if (is_null($key)) $this->throwTooFewArgumentsException();

        $instance = $this->make($key);

        if (!method_exists($instance, $name)) $this->throwBadMethodCallException($name);

        $instance = $instance->$name(...$arguments);

        if (!($instance instanceof ValidationRules)) $this->throwBadMethodCallException($name);

        return $instance;
    }

    /**
     * throw Too Few Arguments Exception
     * 
     * @return void
     */
    protected function throwTooFewArgumentsException(): void
    {
        throw new \BadMethodCallException("too few arguments to function " . static::class . "::make(), 0 passed in. exactly 1 expected.");
    }

    /**
     * throw Bad Method Call Exception
     * 
     * @param string $name
     * @return void
     */
    protected function throwBadMethodCallException(string $name): void
    {
        throw new \BadMethodCallException("method " . ValidationRules::class . "::{$name}() does not exist.");
    }
}
