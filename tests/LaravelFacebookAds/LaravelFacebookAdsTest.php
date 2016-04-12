<?php

namespace LaravelFacebookAds\Tests;

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

    public function test_ad_accounts_list()
    {
        $adAccounts = $this->createAdAccountsMock();

        $insights = $this->createInsightsMock();

        $fb = new FacebookAds(
            $adAccounts,
            $insights
        );

        $fb->adAccounts()->list(['name']);
    }

    public function test_ad_accounts_get_ads()
    {
        $adAccounts = $this->createAdAccountsMock();

        $insights = $this->createInsightsMock();

        $fb = new FacebookAds(
            $adAccounts,
            $insights
        );

        $fb->adAccounts()->getAds(1, ['name']);
    }
}
