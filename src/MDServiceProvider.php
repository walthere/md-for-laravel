<?php

namespace Walthere\MD;

use Illuminate\Support\ServiceProvider;

class MDServiceProvider extends ServiceProvider{



    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }

        $configPath = realpath(__DIR__ . '/config/MD.php');
        $this->mergeConfigFrom($configPath, 'MD');
        $this->publishes([$configPath => config_path('MD.php')], 'config');

        $viewPath = realpath(__DIR__ . '/views');
        $this->loadViewsFrom($viewPath, 'MD');
        $this->publishes([
            realpath(__DIR__ . '/views') => base_path('resources/views/vendor/MD'),
        ], 'view');
        $this->publishes([
            realpath(__DIR__ . '/resources') => public_path() . '/assets/js/editormd',
        ], 'assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = realpath(__DIR__ . '/../config/MD.php');

    }


}