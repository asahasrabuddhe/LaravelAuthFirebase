<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Tests;

use Asahasrabuddhe\LaravelAuthFirebase\Providers\FirebaseUserProvider;
use Mockery as m;

class FirebaseUserProviderTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testCreateByCredentialsSuccess()
    {
        $firebaseAuth = m::mock('\Kreait\Firebase\Auth');
        $firebaseAuth->shouldReceive('createUserWithEmailAndPassword')->with('example@email.com', 'password')->andReturns(new \Kreait\Firebase\Auth\User());

        $userProvider = new FirebaseUserProvider($firebaseAuth);
        $this->assertEquals(new \Kreait\Firebase\Auth\User(), $userProvider->createByCredentials(['email' => 'example@email.com', 'password' => 'password']));
    }

    public function testValidateCredentialsIncorrectCredentials()
    {
        $user = m::mock('\Illuminate\Contracts\Auth\Authenticatable');
        $user->shouldReceive('getAuthIdentifierName')->andReturns('example1@email.com');
        $user->shouldReceive('getAuthIdentifier')->andReturns(1);
        $user->shouldReceive('getAuthPassword')->andReturns('password1');

        $firebaseAuth = m::mock('\Kreait\Firebase\Auth');
        $firebaseAuth->shouldReceive('getUserByEmailAndPassword')->with('example@email.com', 'password')->andReturns(new \Kreait\Firebase\Auth\User());

        $userProvider = new FirebaseUserProvider($firebaseAuth);

        $this->assertNotEquals($user, $userProvider->validateCredentials($user, ['email' => 'example@email.com', 'password' => 'password']));
    }

    // public function testValidateCredentialsCorrectCredentials()
    // {
    // 	$user = m::mock('\Illuminate\Contracts\Auth\Authenticatable');
    // 	$user->shouldReceive('getAuthIdentifierName')->andReturns('example1@email.com');
    // 	$user->shouldReceive('getAuthIdentifier')->andReturns(1);
    // 	$user->shouldReceive('getAuthPassword')->andReturns('password1');

    // 	$firebaseAuth = m::mock('\Kreait\Firebase\Auth');
    // 	$firebaseAuth->shouldReceive('getUserByEmailAndPassword')->with('example@email.com', 'password')->andReturns(new \Kreait\Firebase\Auth\User());

    // 	$userProvider = new FirebaseUserProvider($firebaseAuth);

    // 	$this->assertNotEquals($user, $userProvider->validateCredentials($user, ['email' => 'example@email.com', 'password' => 'password']));
    // }

    // public function testValidateCredentialsInvalidCredentials()
    // {

    // }
}
