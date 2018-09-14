<?php

namespace LaravelFacebookAds\Tests;

use Edbizarro\LaravelFacebookAds\Facades\FacebookAds;
use FacebookAds\Logger\CurlLogger;
use Edbizarro\LaravelFacebookAds\Period;
use Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider;
use FacebookAds\Object\AdsInsights;
use FacebookAds\Object\Fields\AdsInsightsFields;
use FacebookAds\Object\Values\AdsInsightsLevelValues;
use Orchestra\Testbench\TestCase;
use Mockery as m;

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
