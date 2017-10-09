<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Traits;

use Asahasrabuddhe\LaravelAuthFirebase\Events\UserCreating;
use Asahasrabuddhe\LaravelAuthFirebase\Events\UserDeleting;
use Asahasrabuddhe\LaravelAuthFirebase\Events\UserUpdating;

trait AuthenticatesWithFirebase
{
    /**
     * @var array | Events
     *
     * Maps Eloquent events to Trait methods
     */
    protected $events = [
        'creating'   => UserCreating::class,
        'updating'   => UserUpdating::class,
        'deleting'   => UserDeleting::class,
    ];

    public function getDispatchedEvents()
    {
        return $this->events;
    }
}
