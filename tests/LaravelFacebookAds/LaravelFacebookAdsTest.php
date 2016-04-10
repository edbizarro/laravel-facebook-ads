<?php

namespace LaravelFacebookAds\Tests;

use LaravelFacebookAds\Tests\BaseTest;
use Edbizarro\LaravelFacebookAds\Contracts;
use Edbizarro\LaravelFacebookAds\FacebookAds;

/**
 * Class LaravelFacebookAdsTest.
 */
class LaravelFacebookAdsTest extends BaseTest
{
    /**
     * Verify if FacebookAds are in service container.
     */
    public function test_container_are_provided()
    {
        $this->assertInstanceOf(
            Contracts\LaravelFacebookAdsContract::class,
            $this->app[FacebookAds::class]
        );
    }
}
