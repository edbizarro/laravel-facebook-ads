<?php

namespace LaravelFacebookAds\Tests;

use Edbizarro\LaravelFacebookAds\Facades\FacebookAds;
use Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider;
use FacebookAds\Logger\CurlLogger;
use Orchestra\Testbench\TestCase;
use Mockery as m;
use Edbizarro\LaravelFacebookAds\Period;
use FacebookAds\Object\Values\AdsInsightsLevelValues;

/**
 * Class BaseTest.
 */
class BaseTest extends TestCase
{
    public function test_test()
    {
    }

    public function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function setUp()
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [LaravelFacebookServiceProvider::class];
    }
}
