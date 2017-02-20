<?php

namespace Edbizarro\LaravelFacebookAds\Contracts;

use Edbizarro\LaravelFacebookAds\FacebookAds;

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
     * @return FacebookAds
     */
    public function init($accessToken);
}
