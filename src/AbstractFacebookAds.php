<?php

namespace Edbizarro\LaravelFacebookAds;

use Edbizarro\LaravelFacebookAds\Contracts\LaravelFacebookAdsContract;
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
     * {@inheritdoc}
     */
    public function apiInstance()
    {
        return $this->adsApiInstance;
    }

    /**
     * {@inheritdoc}
     */
    public function setAccessToken($accessToken)
    {
        Api::init(config('facebook-ads.app_id'), config('facebook-ads.app_secret'), $accessToken);
        
        return $this->adsApiInstance = Api::instance();
    }
}
