<?php

namespace Asahasrabuddhe\LaravelAuthFirebase;

use Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider;
use Illuminate\Support\Facades\Auth;
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
        $this->publishes([
            __DIR__ . '/Config/firebase.php' => config_path('firebase.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Auth::provider('firebase', function ($app, array $config) {
            return new FirebaseUserProvider;
        });

        $this->mergeConfigFrom(__DIR__ . '/Config/firebase.php', 'laravel_auth_firebase');

        $this->app->singleton('laravel_auth_firebase', function ($app) {
            return new LaravelAuthFirebase();
        });
    }
}
