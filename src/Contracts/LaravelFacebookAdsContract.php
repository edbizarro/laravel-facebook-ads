<?php

namespace Edbizarro\LaravelFacebookAds\Contracts;

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
     * Initialize the Facebook Ads SDK
     *
     * @param $accessToken
     */
    public function init($accessToken);
}
