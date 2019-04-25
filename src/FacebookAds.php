<?php

namespace Edbizarro\LaravelFacebookAds;

use Edbizarro\LaravelFacebookAds\Entities\InstagramAccounts;
use Illuminate\Support\Traits\Macroable;
use Edbizarro\LaravelFacebookAds\Entities\Campaigns;
use Edbizarro\LaravelFacebookAds\Entities\AdAccounts;

class FacebookAds extends AbstractFacebookAds
{
    use Macroable;

    /**
     * @param Period $period
     * @param $accountId
     * @param string $level [ad, adset, campaign, account]
     * @param array $params
     *
     * @see https://developers.facebook.com/docs/marketing-api/insights
     *
     * @return \Illuminate\Support\Collection
     */
    public function insights(
        Period $period,
        $accountId,
        $level,
        array $params
    ) {
        return (new Insights)->get(
            $period,
            $accountId,
            $level,
            $params
        );
    }

    /**
     * @return AdAccounts
     */
    public function adAccounts(): AdAccounts
    {
        return new AdAccounts;
    }

    /**
     * @return InstagramAccounts
     */
    public function instagramAccounts(): InstagramAccounts
    {
        return new InstagramAccounts;
    }

    /**
     * @return Campaigns
     */
    public function campaigns(): Campaigns
    {
        return new Campaigns;
    }
}
