<?php

namespace Mariojgt\Onix;

use Mariojgt\Onix\Commands\Install;
use Mariojgt\Onix\Commands\Republish;
use Mariojgt\Onix\Middleware\OnixApi;
use Illuminate\Support\ServiceProvider;
use Mariojgt\Onix\Commands\CreateOnixBlock;
use Mariojgt\Onix\Commands\InstallTemplate;

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
                CreateOnixBlock::class,
                InstallTemplate::class,
            ]);
        }

        // Load onix views
        $this->loadViewsFrom(__DIR__ . '/views', 'onix');
        // Load onix routes
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        // Load api routes
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
        // Load Migrations
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        $this->app['router']->aliasMiddleware('onix-api', OnixApi::class);
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
            __DIR__ . '/../Publish/Npm/' => base_path(),
        ]);

        // Publish the resource in case we need to compile
        $this->publishes([
            __DIR__ . '/../Publish/Resource/' => resource_path('vendor/Onix/'),
        ]);

        // Publish the public folder
        $this->publishes([
            __DIR__ . '/../Publish/Public/' => public_path('vendor/Onix/'),
        ]);

        // Publish the config folder
        $this->publishes([
            __DIR__ . '/../Publish/Config/' => config_path(''),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Publish the example blocks
        |--------------------------------------------------------------------------
        */
        // Publish the blocks classes
        $this->publishes([
            __DIR__ . '/../Publish/OnixPhpBlocks/Class' => app_path('Onix/Blocks'),
        ]);

        // Publish the blocks media file
        $this->publishes([
            __DIR__ . '/../Publish/OnixPhpBlocks/Media' => resource_path('views/onix/media'),
        ]);

        // Publish the blocks media file
        $this->publishes([
            __DIR__ . '/../Publish/OnixPhpBlocks/Blocks' => resource_path('views/onix/blocks'),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Publish the stubs for the pages for the deploy
        |--------------------------------------------------------------------------
        */
        $this->publishes([
            __DIR__ . '/../Publish/Stubs' => app_path('Onix/Stubs'),
        ]);

        // Publish the layout file for the blade page
        $this->publishes([
            __DIR__ . '/../Publish/BladeLayout/' => resource_path('views/components/layout'),
        ]);

        // publish the templates
        $this->publishes([
            __DIR__ . '/../Publish/Templates/' => public_path('templates/'),
        ]);
    }
}
