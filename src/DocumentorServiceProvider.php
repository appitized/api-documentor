<?php

namespace Appitized\Documentor;

use Illuminate\Support\ServiceProvider;

class DocumentorServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'documentor');
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/../routes.php';
        }
        $this->publishes([
            __DIR__.'/assets' => public_path('appitized/documentor'),
        ], 'public');
        $this->publishes([
            __DIR__.'/config/settings.php' => config_path('documentor/settings.php'),
        ]);
        $this->mergeConfigFrom(__DIR__.'/config/settings.php', 'documentor.settings');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
