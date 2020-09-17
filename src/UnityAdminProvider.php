<?php

namespace Mariojgt\Onix;

use Illuminate\Support\ServiceProvider;

class OnixProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        // load onix views
        $this->loadViewsFrom(__DIR__.'/views', 'onix');
        // load onix routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
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
        // publish the npm case we need to do soem developent
        $this->publishes([
            __DIR__.'/../Publish/Npm/' => base_path()
        ]);

        // publish the resource in case we need to compile
        $this->publishes([
            __DIR__.'/../Publish/Resource/' => resource_path('vendor/Onix/')
        ]);

        // publish the public folder
        $this->publishes([
            __DIR__.'/../Publish/Public/' => public_path('vendor/Onix/')
        ]);
    }
}
