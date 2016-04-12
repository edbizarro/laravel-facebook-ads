<?php

namespace Edbizarro\LaravelFacebookAds;

use Edbizarro\LaravelFacebookAds\Contracts\LaravelFacebookAdsContract;
use Edbizarro\LaravelFacebookAds\Services\AdAccounts;
use Edbizarro\LaravelFacebookAds\Services\Insights\Insights;
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
     * @var Insights
     */
    protected $insights;

    /**
     * AbstractFacebookAds constructor.
     *
     * @param AdAccounts $adAccounts
     * @param Insights   $insights
     */
    public function __construct(AdAccounts $adAccounts, Insights $insights)
    {
        $this->adAccounts = $adAccounts;
        $this->insights = $insights;
    }

    /**
     * {@inheritdoc}
     */
    public function apiInstance()
    {
        return $this->adsApiInstance;
    }

    /**
     * @param $adsApiInstance
     */
    public function setApiInstance($adsApiInstance)
    {
        $this->adsApiInstance = $adsApiInstance;
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

        return Api::instance();
    }
}
