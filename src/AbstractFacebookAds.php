<?php

namespace Edbizarro\LaravelFacebookAds;

use FacebookAds\Api;
use Illuminate\Support\Traits\Macroable;
use Edbizarro\LaravelFacebookAds\Contracts\LaravelFacebookAdsContract;

/**
 * Class AbstractFacebookAds.
 */
abstract class AbstractFacebookAds implements LaravelFacebookAdsContract
{
    use Macroable;

    /**
     * @var Api
     */
    protected $adsApiInstance;

    public function init($accessToken): FacebookAds
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
     * @return Api
     */
    public function getFbApiInstance(): Api
    {
        return $this->adsApiInstance;
    }
}
