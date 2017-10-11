<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Tests;

use Firebase;

class ConfigurationTest extends TestCase
{
    /**
     * Check if the configuration is set properly.
     *
     * @return void
     */
    public function testConfiguration()
    {
        $this->assertSame(config('firebase.api_key'), '<FIREBASE_API_KEY>');
        $this->assertSame(config('firebase.service_account_json_path'), '<PATH_TO_SERVICE_ACCOUNT_JSON_FILE>');
    }
}
