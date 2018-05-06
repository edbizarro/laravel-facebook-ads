<?php

namespace Edbizarro\LaravelFacebookAds;

use Edbizarro\LaravelFacebookAds\Entities\AdAccounts;
use Edbizarro\LaravelFacebookAds\Entities\Campaigns;

/**
 * Class FacebookAds.
 */
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
