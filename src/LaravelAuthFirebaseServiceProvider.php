<?php

namespace Asahasrabuddhe\LaravelAuthFirebase;

use Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\ServiceAccount;

class LaravelAuthFirebaseServiceProvider extends ServiceProvider
{
    /**
     * @var \Asahasrabuddhe\LaravelAuthFirebase
     */
    protected $firebase;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/firebase.php' => config_path('firebase.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $that = $this;

        $this->app->singleton('laravel_auth_firebase', function ($app) {
            $apiKey = config('firebase.api_key');
            $serviceAccount = ServiceAccount::fromJsonFile(config('firebase.service_account_json_path'));

            return new LaravelAuthFirebase($apiKey, $serviceAccount);
        });

        Auth::provider('firebase', function ($app, array $config) {
            $firebase = $app->make('laravel_auth_firebase');

            return new FirebaseUserProvider($firebase->getAuthInstance());
        });

        $this->mergeConfigFrom(__DIR__.'/Config/firebase.php', 'firebase');
    }

    public function getFirebaseInstance()
    {
        return $this->firebase;
    }
}
