<?php

namespace LaravelFacebookAds\Tests;

use Edbizarro\LaravelFacebookAds\Contracts;
use Edbizarro\LaravelFacebookAds\FacebookAds;
use Edbizarro\LaravelFacebookAds\Services\AdAccounts;
use Edbizarro\LaravelFacebookAds\Services\Insights\Insights;
use FacebookAds\Api;
use Mockery as m;

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

    public function test_api_init()
    {
        $apiMock = m::mock('overload:FacebookAds\Api');
        $apiMock->shouldReceive('instance')
            ->andReturnSelf();
        $apiMock->shouldReceive('init')
            ->with('', '', 'access_token')
            ->andReturnSelf();

        $fb = new FacebookAds((new AdAccounts()), (new Insights()));
        $fb->init('access_token');
    }

    public function test_ad_account_property_is_right()
    {
        $fb = $this->createFacebookAdsInstance();

        $this->assertInstanceOf(AdAccounts::class, $fb->adAccounts());
    }

    public function test_insights_property_is_right()
    {
        $fb = $this->createFacebookAdsInstance();

        $this->assertInstanceOf(Insights::class, $fb->insights());
    }
}
