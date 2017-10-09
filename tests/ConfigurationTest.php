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
        $this->assertSame(Firebase::demo(), '<PATH_TO_SERVICE_ACCOUNT_JSON_FILE>');
    }
}
