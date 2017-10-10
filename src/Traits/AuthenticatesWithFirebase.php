<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Traits;

use Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider;

trait AuthenticatesWithFirebase
{
    /**
     * @var \Asahasrabuddhe\LaravelAuthFirebase\Providers\UserProvider
     */
    protected $userProvider;

    public function save(array $options = [])
    {
        $this->userProvider = new FirebaseUserProvider();

        $user_info = json_decode($this->user_info);
        $user = $this->userProvider->retrieveByCredentials(['email' => $user_info->email, 'password' => $user_info->password]);
        $user = $this->userProvider->updateUser($user, ['displayName' => $user_info->firstName.' '.$user_info->lastName, 'photoURL' => null, 'deleteAttribute' => []]);
        dd($user->getIdToken());

        parent::save();
    }
}
