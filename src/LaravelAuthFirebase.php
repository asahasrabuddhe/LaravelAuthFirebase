<?php

namespace Asahasrabuddhe\LaravelAuthFirebase;

class LaravelAuthFirebase
{
    public static function demo()
    {
        return config('firebase.service_account_json_path');
    }
}
