<?php

namespace YukataRm\Laravel\Validation\Facades\Managers;

use YukataRm\Laravel\Validation\Interfaces\Rules\ValidationRulesInterface;
use YukataRm\Laravel\Validation\Rules\ValidationRules;

/**
 * Validation Rules Facade Manager
 *
 * @package YukataRm\Laravel\Validation\Facades\Managers
 */
class RulesManager
{
    /**
     * make Rules instance
     *
     * @param string $key
     * @return \YukataRm\Laravel\Validation\Interfaces\Rules\ValidationRulesInterface
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
     * @return \YukataRm\Laravel\Validation\Interfaces\Rules\ValidationRulesInterface
     */
    public function __call(string $name, array $arguments): ValidationRulesInterface
    {
        $key = array_shift($arguments);

        $instance = $this->make($key);

        $instance = $instance->$name(...$arguments);

        return $instance;
    }
}
