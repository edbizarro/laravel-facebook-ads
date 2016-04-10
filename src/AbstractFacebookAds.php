<?php

namespace Edbizarro\LaravelFacebookAds;

use Edbizarro\LaravelFacebookAds\Contracts\LaravelFacebookAdsContract;
use Edbizarro\LaravelFacebookAds\Services\AdAccounts;
use FacebookAds\Api;

/**
 * Class AbstractFacebookAds.
 */
abstract class AbstractFacebookAds implements LaravelFacebookAdsContract
{
    /**
     * @var Api|null
     */
    protected $adsApiInstance;

    /**
     * @var AdAccounts
     */
    protected $adAccounts;

    /**
     * {@inheritdoc}
     */
    public function apiInstance()
    {
        return $this->adsApiInstance;
    }

    /**
     * {@inheritdoc}
     */
    public function init($accessToken)
    {
        $api = Api::init(config('facebook-ads.app_id'), config('facebook-ads.app_secret'), $accessToken);
        $this->adsApiInstance = $api;
        $this->adAccounts = new AdAccounts($this->adsApiInstance);
    }
}
