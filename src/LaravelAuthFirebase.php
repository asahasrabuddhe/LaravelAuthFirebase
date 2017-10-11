<?php

namespace Asahasrabuddhe\LaravelAuthFirebase;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class LaravelAuthFirebase
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

    public function __construct(string $apiKey, ServiceAccount $serviceAccount)
    {
        $this->apiKey = $apiKey;
        $this->serviceAccount = $serviceAccount;

        $this->firebase = (new Factory())
            ->withServiceAccountAndApiKey($serviceAccount, $apiKey)
            ->create();
    }

    public function getAuthInstance()
    {
        return $this->firebase->getAuth();
    }

    public function getDatabaseInstance()
    {
        return $this->firebase->getDatabase();
    }
}
