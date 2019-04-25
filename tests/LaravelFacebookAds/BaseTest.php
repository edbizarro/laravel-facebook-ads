<?php

namespace LaravelFacebookAds\Tests;

use Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider;
use Mockery as m;
use Orchestra\Testbench\TestCase;

/**
 * Class BaseTest.
 */
class BaseTest extends TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [LaravelFacebookServiceProvider::class];
    }
}
