<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Providers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Kreait\Firebase;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Auth\User;

class FirebaseUserProvider implements UserProvider
{
    /**
     * Firebase Authentication Instance.
     *
     * @var \Kreait\Firebase\Auth;
     */
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param mixed $identifier
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        return \Exception('Not Implemented');
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param mixed  $identifier
     * @param string $token
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        return \Exception('Not Implemented');
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @param string                                     $token
     *
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        return \Exception('Not Implemented');
    }

    /**
     * Create a user by the given credentials.
     *
     * @param array $credentials
     *
     * @return \Kreait\Firebase\Auth\User
     */
    public function createByCredentials(array $credentials): User
    {
        $user = $this->auth->createUserWithEmailAndPassword($credentials['email'], $credentials['password']);

        return $user;
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param array $credentials
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $username = '';
        $password = '';

        if (count($credentials) == 2) {
            foreach ($credentials as $key => $value) {
                if ($key == 'password') {
                    $password = $value;
                } else {
                    $username = $value;
                }
            }
        } else {
            throw new \Exception('Not Supported');
        }

        return \App\User::where('user_info->email', $username)->first();
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @param array                                      $credentials
     *
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $username = '';
        $password = '';

        if (count($credentials) == 2) {
            foreach ($credentials as $key => $value) {
                if ($key == 'password') {
                    $password = $value;
                } else {
                    $username = $value;
                }
            }
        } else {
            throw new \Exception('Not Supported');
        }

        try {
            $firebaseUser = $this->auth->getUserByEmailAndPassword($username, $password);

            $user_info = json_decode($user->user_info);

            if ($user_info->email == $firebaseUser->getEmail()) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Update User profile.
     *
     * @param \Kreait\Firebase\Auth\User
     * @param array $userInfo
     *
     * @return \Kreait\Firebase\Auth\User
     */
    public function updateUser(User $user, array $userInfo): User
    {
        $user = $this->auth->updateUserProfile($user, $userInfo);

        return $user;
    }
}
