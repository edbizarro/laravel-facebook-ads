<?php

namespace LaravelFacebookAds\Tests;

use Mockery as m;
use Orchestra\Testbench\TestCase;

/**
 * Class BaseTest.
 */
class BaseTest extends TestCase
{
    public function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
    }
}
