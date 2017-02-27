<?php

namespace Edbizarro\LaravelFacebookAds;

use FacebookAds\Api;
use Edbizarro\LaravelFacebookAds\Services\AdAccounts;
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
     * @var AdAccounts
     */
    protected $adAccounts;

    /**
     * AbstractFacebookAds constructor.
     *
     * @param AdAccounts $adAccounts
     */
    public function __construct(AdAccounts $adAccounts)
    {
        $this->adAccounts = $adAccounts;
    }

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
