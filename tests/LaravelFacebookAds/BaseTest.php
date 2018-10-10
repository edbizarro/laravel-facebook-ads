<?php

namespace LaravelFacebookAds\Tests;

use Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider;
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

        dd(FacebookAds::insights(
            Period::days(30),
            $this->etlJob['params']['account_id'],
            AdsInsightsLevelValues::AD,
            [
                'fields' => [
                    'account_id',
                    'account_name',
                    'campaign_id',
                    'campaign_name',
                    'ad_id',
                    'ad_name',
                    'adset_id',
                    'adset_name',
                    'actions',
                    'impressions',
                    'clicks',
                    'unique_clicks',
                    'spend',
                    'social_spend',
                    'reach',
                    'video_10_sec_watched_actions',
                    'video_30_sec_watched_actions',
                    'video_p25_watched_actions',
                    'video_p50_watched_actions',
                    'video_p75_watched_actions',
                    'video_p100_watched_actions'
                ]
            ]
        ));
    }

    protected function getPackageProviders($app)
    {
        return [LaravelFacebookServiceProvider::class];
    }
}
