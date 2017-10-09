<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Listeners;

use Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider;

abstract class UserAbstractListener
{
    /**
     * @var \Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider
     */
    public $userProvider;

    public function __construct()
    {
        $this->userProvider = new FirebaseUserProvider();
    }
}
