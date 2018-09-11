<?php

namespace LaravelFacebookAds\Tests;

use Edbizarro\LaravelFacebookAds\Facades\FacebookAds;
use Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider;
use Orchestra\Testbench\TestCase;
use Mockery as m;

/**
 * Class BaseTest.
 */
abstract class BaseTest extends TestCase
{
    public function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function setUp()
    {
        parent::setUp();

        FacebookAds::init(env('FB_ACCESS_TOKEN'));
    }

    protected function getPackageProviders($app)
    {
        return [LaravelFacebookServiceProvider::class];
    }
}
