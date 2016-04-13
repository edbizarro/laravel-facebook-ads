<?php

namespace LaravelFacebookAds\Tests\Services;

use Illuminate\Support\Collection;
use LaravelFacebookAds\Tests\BaseTest;

class AdAccountsTest extends BaseTest
{
    public function test_ad_accounts_all()
    {
        $fb = $this->createFacebookAdsInstance();
        $acc = $fb->adAccounts();
        $result = $acc->all(['name']);

        $this->assertInstanceOf(Collection::class, $result);
    }

    public function test_ad_accounts_get_ads()
    {
        $fb = $this->createFacebookAdsInstance();

        $result = $fb->adAccounts()->getAds(1, ['name']);

        $this->assertInstanceOf(Collection::class, $result);
    }
}
