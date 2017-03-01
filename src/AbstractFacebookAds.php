<?php

namespace Edbizarro\LaravelFacebookAds;

use FacebookAds\Api;
use Edbizarro\LaravelFacebookAds\Contracts\LaravelFacebookAdsContract;

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
    public function init($accessToken)
    {
        Api::init(
            config('facebook-ads.app_id'),
            config('facebook-ads.app_secret'),
            $accessToken
        );

        $this->adsApiInstance = Api::instance();

        return $this;
    }

    /**
     * Get the Facebook Ads API instance.
     *
     * @return Api|null
     */
    public function getFbApiInstance()
    {
        return $this->adsApiInstance;
    }
}
