<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Listeners;

use Asahasrabuddhe\LaravelAuthFirebase\Events\UserUpdating as UserUpdatingEvent;

class UserUpdating
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \Asahasrabuddhe\LaravelAuthFirebase\Events\UserUpdating $event
     *
     * @return void
     */
    public function handle(UserUpdatingEvent $event)
    {
        error_log($event->user->user_info);
    }
}
