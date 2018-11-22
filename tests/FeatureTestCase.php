<?php

namespace VioletaskyaContact\Tests;

use Orchestra\Testbench\TestCase;
use VioletaskyaContact\AppServiceProvider;

class FeatureTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AppServiceProvider::class
        ];
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $config = $app->get('config');
        $config->set('logging.default', 'errorlog');
        $config->set('app.MAIL_FROM', 'TestFrom');
        $config->set('app.MAIL_TO', 'test@example.com');
        $config->set('app.MAIL_NAME', 'TestMailName');
    }
}