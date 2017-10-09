<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Tests;

use Asahasrabuddhe\LaravelAuthFirebase\Tests\TestCase;
use Firebase;

class ConfigurationTest extends TestCase
{
	/**
	 * Check if the configuration is set properly
	 *
	 * @return void
	 */
	public function testConfiguration()
	{
		$this->assertSame(Firebase::demo(), '');
	}
}