<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Traits;

use Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider;
use Hash;
use Illuminate\Support\Facades\App;

trait AuthenticatesWithFirebase
{
    /**
     * @var \Asahasrabuddhe\LaravelAuthFirebase\Providers\UserProvider
     */
    protected $userProvider;

    public function save(array $options = [])
    {
        if (!$this->exists) {
            $firebase = App::make('laravel_auth_firebase');
            $this->userProvider = new FirebaseUserProvider($firebase->getAuthInstance());

            $user_info = json_decode($this->user_info);
            $user = $this->userProvider->createByCredentials(['email' => $user_info->email, 'password' => $user_info->password]);

            $user_info->password = Hash::make($user_info->password);
            $this->user_info = json_encode($user_info);
        }

        return parent::save();
    }
}
