<?php

namespace Asahasrabuddhe\LaravelAuthFirebase;

use Illuminate\Support\ServiceProvider;

class LaravelAuthFirebaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravel_auth_firebase', function ($app) {
            return new LaravelAuthFirebase();
        });
    }
}
