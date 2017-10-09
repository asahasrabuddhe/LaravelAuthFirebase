<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Listeners;

use Asahasrabuddhe\LaravelAuthFirebase\Events\UserCreating as UserCreatingEvent;

class UserCreating extends UserAbstractListener
{
    /**
     * Handle the event.
     *
     * @param \Asahasrabuddhe\LaravelAuthFirebase\Events\UserCreating $event
     *
     * @return void
     */
    public function handle(UserCreatingEvent $event)
    {
        $user_info = json_decode($event->user->user_info);

        $firebaseUser = $this->userProvider->createByCredentials(['email' => $user_info->email, 'password' => $user_info->password]);

        dump($firebaseUser);
        dump($event->user);
    }
}
