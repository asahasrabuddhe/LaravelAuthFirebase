<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Events;

class UserUpdating extends UserAbstractEvent
{
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
