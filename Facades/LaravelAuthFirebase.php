<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Facades;

use Illumilate\Support\Facades\Facade;

class LaravelAuthFirebase extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel_auth_firebase';
    }
}
