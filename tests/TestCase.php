<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Artisan;

/**
 * Base class for unit and integration tests
 */
abstract class TestCase extends BaseTestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:install');
        Artisan::call('migrate:refresh');
    }

    use CreatesApplication;
}
