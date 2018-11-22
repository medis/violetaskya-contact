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
         * Publish config.
         */
        $this->publishes([
            __DIR__.'/config/contact.php' => config_path('contact.php'),
        ]);

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
    }
}