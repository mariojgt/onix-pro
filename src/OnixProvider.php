<?php

namespace Mariojgt\Onix;

use Illuminate\Support\ServiceProvider;
use Mariojgt\Onix\Commands\Republish;
use Mariojgt\Onix\Commands\Install;

class OnixProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load some commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Republish::class,
                Install::class,
            ]);
        }

        // Load onix views
        $this->loadViewsFrom(__DIR__ . '/views', 'onix');
        // Load onix routes
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        // Load Migrations
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publish();
    }

    public function publish()
    {
        // Publish the npm case we need to do soem developent
        $this->publishes([
            __DIR__ . '/../Publish/Npm/' => base_path()
        ]);

        // Publish the resource in case we need to compile
        $this->publishes([
            __DIR__ . '/../Publish/Resource/' => resource_path('vendor/Onix/')
        ]);

        // Publish the public folder
        $this->publishes([
            __DIR__ . '/../Publish/Public/' => public_path('vendor/Onix/')
        ]);

        // Publish the public folder
        $this->publishes([
            __DIR__ . '/../Publish/Config/' => config_path('')
        ]);
    }
}
