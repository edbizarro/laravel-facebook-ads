<?php

namespace LaravelFacebookAds\Tests\Services;


use LaravelFacebookAds\Tests\BaseTest;

class AdAccountsTest extends BaseTest
{
    public function test_ad_accounts_all()
    {
        $fb = $this->createFacebookAdsInstance();
        $acc = $fb->adAccounts();
        $acc->all(['name']);
    }

    public function test_ad_accounts_get_ads()
    {
        $fb = $this->createFacebookAdsInstance();

        $fb->adAccounts()->getAds(1, ['name']);
    }
}
