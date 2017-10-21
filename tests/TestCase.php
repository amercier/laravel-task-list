<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Base class for unit and integration tests
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
