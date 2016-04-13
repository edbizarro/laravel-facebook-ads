<?php

namespace LaravelFacebookAds\Tests\Services;

use Illuminate\Support\Collection;
use LaravelFacebookAds\Tests\BaseTest;
use Mockery as m;

class InsightsTest extends BaseTest
{

    public function test_get_insights_by_type()
    {
        $fb = $this->createFacebookAdsInstance();
        $insights = $fb->insights();
        $i = $insights ->get(
            'ad_account',
            'act_xxxxx',
            [
                'fields' =>
                [
                    'name'
                ]
            ]
        );

        $this->assertInstanceOf(Collection::class, $i);
    }
}
