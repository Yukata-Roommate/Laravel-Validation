<?php

namespace YukataRm\Laravel\Validation;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

use YukataRm\Laravel\Validation\Facades\Rules;
use YukataRm\Laravel\Validation\Facades\Managers\RulesManager;

/**
 * Validation Service Provider
 *
 * @package YukataRm\Laravel\Validation
 */
class ServiceProvider extends BaseServiceProvider
{
    /*----------------------------------------*
     * Register
     *----------------------------------------*/

    /**
     * register
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacade();
    }

    /**
     * register Facade
     *
     * @return void
     */
    protected function registerFacade()
    {
        $this->app->singleton(Rules::class, function () {
            return new RulesManager();
        });
    }
}
