<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class LaravelAuthFirebaseEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Asahasrabuddhe\LaravelAuthFirebase\Events\UserCreating' => [
            'Asahasrabuddhe\LaravelAuthFirebase\Listeners\UserCreating',
        ],
        'Asahasrabuddhe\LaravelAuthFirebase\Events\UserDeleting' => [
            'Asahasrabuddhe\LaravelAuthFirebase\Listeners\UserDeleting',
        ],
        'Asahasrabuddhe\LaravelAuthFirebase\Events\UserUpdating' => [
            'Asahasrabuddhe\LaravelAuthFirebase\Listeners\UserUpdating',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}