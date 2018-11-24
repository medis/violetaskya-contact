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
        $this->loadViewsFrom(__DIR__ . '/Views', 'violetaskya-contact');

        /**
         * Publish config.
         */
        $this->publishes([
            __DIR__.'/../config/contact.php' => config_path('contact.php'),
        ], 'violetaskya-contact-config');
    }

    public function register()
    {
        $this->commands([
            Console\UpdateCommand::class
        ]);
    }
}