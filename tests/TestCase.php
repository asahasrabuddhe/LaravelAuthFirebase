<?php

namespace Asahasrabuddhe\LaravelAuthFirebase\Tests;

use Asahasrabuddhe\LaravelAuthFirebase\Facades\LaravelAuthFirebase;
use Asahasrabuddhe\LaravelAuthFirebase\LaravelAuthFirebaseServiceProvider;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
	/**
	 * Load package service provider
	 * 
	 * @param \Illuminate\Foundation\Application $app
	 * @return Asahasrabuddhe\LaravelAuthFirebase\LaravelAuthFirebaseServiceProvider
	 */
	 protected function getPackageProviders($app)
	 {
	 	return [LaravelAuthFirebaseServiceProvider::class];
	 }

	 /**
	  * Load package alias
	  *
	  * @param \Illuminate\Foundation\Application $app
	  * @return array
	  */
	  protected function getPackageAliases($app)
	  {
	  	return [
	  		'Firebase' => LaravelAuthFirebase::class,
	  	];
	  }
}