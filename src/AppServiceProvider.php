<?php

namespace VioletaskyaContact;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /**
         * Register local routes.
         */
        include __DIR__ . '/routes.php';

        /**
         * Register views.
         */
        $this->loadViewsFrom(__DIR__ . '/Views', 'violetaskya-frontend');

        /**
         * Assets.
         */
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/violetaskya'),
            ], 'violetaskya-assets');
        }
    }

    public function register()
    {
        $this->commands([
            Console\InstallCommand::class,
            Console\UpdateCommand::class
        ]);
    }
}