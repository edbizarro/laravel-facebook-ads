<?php

namespace Edbizarro\LaravelFacebookAds;

use Edbizarro\LaravelFacebookAds\Entities\Campaigns;
use Edbizarro\LaravelFacebookAds\Entities\AdAccounts;

class FacebookAds extends AbstractFacebookAds
{
    /**
     * @return AdAccounts
     */
    public function adAccounts(): AdAccounts
    {
        return new AdAccounts;
    }

    /**
     * @return Campaigns
     */
    public function campaigns(): Campaigns
    {
        return new Campaigns;
    }
}
