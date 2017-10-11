<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Tests;

use Mockery as m;
use Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider;

class ConfigurationTest extends TestCase
{
	public function tearDown()
	{
		m::close();
	}

	public function testCreateByCredentials()
	{
		$firebaseAuth = m::mock('\Kreait\Firebase\Auth');

		$firebaseAuth->allows()->createUserWithEmailAndPassword('email@example.com', 'password')->andReturns();
	}
}