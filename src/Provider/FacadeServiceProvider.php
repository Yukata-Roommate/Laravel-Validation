<?php

namespace YukataRm\Laravel\Validation\Provider;

use YukataRm\Laravel\Provider\FacadeServiceProvider as BaseServiceProvider;

use YukataRm\Laravel\Validation\Facade\Manager;
use YukataRm\Laravel\Validation\Facade\ValidationRules;

/**
 * Facade Service Provider
 * 
 * @package YukataRm\Laravel\Validation\Provider
 */
class FacadeServiceProvider extends BaseServiceProvider
{
    /**
     * get facades
     * 
     * @return array<string, string>
     */
    protected function facades(): array
    {
        return [
            ValidationRules::class => Manager::class
        ];
    }
}
