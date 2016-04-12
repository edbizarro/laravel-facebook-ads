<?php

namespace LaravelFacebookAds\Tests;

use Edbizarro\LaravelFacebookAds\Contracts;
use Edbizarro\LaravelFacebookAds\FacebookAds;
use Edbizarro\LaravelFacebookAds\Services\AdAccounts;

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

    public function test_ad_account_property_is_right()
    {
        $fb = $this->createFacebookAdsInstance();

        $this->assertInstanceOf(AdAccounts::class, $fb->adAccounts());
    }
}
