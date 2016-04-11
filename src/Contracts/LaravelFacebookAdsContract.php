<?php

namespace Edbizarro\LaravelFacebookAds\Contracts;

use FacebookAds\Api;

/**
 * Interface LaravelFacebookAdsContract.
 */
interface LaravelFacebookAdsContract
{
    /**
     * @return \FacebookAds\Api
     */
    public function apiInstance();

    /**
     * Initialize the Facebook Ads SDK.
     *
     * @param $accessToken
     *
     * @return Api
     */
    public function init($accessToken);
}
