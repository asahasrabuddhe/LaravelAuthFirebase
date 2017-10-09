<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Asahasrabuddhe\LaravelAuthFirebase\Events\UserCreating as UserCreatingEvent;

class UserCreating
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
     * @param  \Asahasrabuddhe\LaravelAuthFirebase\Events\UserCreating  $event
     * @return void
     */
    public function handle(UserCreatingEvent $event)
    {
        error_log($event->user->user_info);
    }
}
