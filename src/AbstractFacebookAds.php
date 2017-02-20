<?php

namespace Edbizarro\LaravelFacebookAds;

use FacebookAds\Api;
use Edbizarro\LaravelFacebookAds\Services\AdAccounts;
use Edbizarro\LaravelFacebookAds\Services\Insights\Insights;
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
}
