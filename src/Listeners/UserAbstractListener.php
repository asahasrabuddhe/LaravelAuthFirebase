<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Listeners;

use Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

abstract class UserAbstractListener
{
	/**
     * @var \Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider
     */
    public $userProvider;

    public function __construct()
    {
    	$this->userProvider = new FirebaseUserProvider;
    }
}