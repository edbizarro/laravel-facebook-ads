<?php

namespace LaravelFacebookAds\Tests\Services;

use Illuminate\Support\Collection;
use LaravelFacebookAds\Tests\BaseTest;

class InsightsTest extends BaseTest
{
    public function test_get_ad_accounts_insights()
    {
        $fb = $this->createFacebookAdsInstance();
        $insights = $fb->insights();
        $i = $insights->get(
            'ad_account',
            'act_xxxxx',
            [
                'fields' => [
                    'name',
                ],
            ]
        );

        $this->assertInstanceOf(Collection::class, $i);
    }

    public function test_get_ad_insights()
    {
        $fb = $this->createFacebookAdsInstance();
        $insights = $fb->insights();
        $i = $insights->get(
            'ad',
            '12313123',
            [
                'fields' => [
                        'start_date',
                    ],
            ]
        );

        $this->assertInstanceOf(Collection::class, $i);
    }

    public function test_get_campaign_insights()
    {
        $fb = $this->createFacebookAdsInstance();
        $insights = $fb->insights();
        $i = $insights->get(
            'campaign',
            '12313123',
            [
                'fields' => [
                        'start_date',
                    ],
            ]
        );

        $this->assertInstanceOf(Collection::class, $i);
    }
}
