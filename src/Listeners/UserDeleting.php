<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Asahasrabuddhe\LaravelAuthFirebase\Events\UserDeleting as UserDeletingEvent;

class UserDeleting
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
     * @param  \Asahasrabuddhe\LaravelAuthFirebase\Events\UserDeleting  $event
     * @return void
     */
    public function handle(UserDeletingEvent $event)
    {
        error_log($event->user->user_info);
    }
}
