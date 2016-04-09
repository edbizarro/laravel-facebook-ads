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
     * @param string $accessToken
     * @return Api|null
     */
    public function setAccessToken($accessToken);
}
