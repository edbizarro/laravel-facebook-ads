<?php

namespace Edbizarro\LaravelFacebookAds\Contracts;

use FacebookAds\Api;

/**
 * Interface LaravelFacebookAdsContract.
 */
interface LaravelFacebookAdsContract
{
    /**
     * Initialize the Facebook Ads SDK.
     *
     * @param $accessToken
     *
     * @return Api
     */
    public function init($accessToken);
}
