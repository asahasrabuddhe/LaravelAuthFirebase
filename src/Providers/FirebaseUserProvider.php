<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Providers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Kreait\Firebase;
use Kreait\Firebase\Auth\User;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseUserProvider implements UserProvider
{
    /**
     * Firebase API Key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Firebase ServiceAccount.
     *
     * @var \Kreait\Firebase\ServiceAccount;
     */
    protected $serviceAccount;

    /**
     * Firebase Application Instance.
     *
     * @var \Kreait\Firebase;
     */
    protected $firebase;

    /**
     * Firebase Application Instance.
     *
     * @var \Kreait\Firebase\Auth;
     */
    protected $auth;

    public function __construct()
    {
        $this->apiKey = config('firebase.api_key');
        $this->serviceAccount = ServiceAccount::fromJsonFile(config('firebase.service_account_json_path'));

        $this->firebase = (new Factory())
            ->withServiceAccountAndApiKey($this->serviceAccount, $this->apiKey)
            ->create();

        $this->auth = $this->firebase->getAuth();
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
        $user = $this->auth->getUserByEmailAndPassword($username, $password);

        dd($user);

        return $user;
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
        return \Exception('Not Implemented');
    }
}
