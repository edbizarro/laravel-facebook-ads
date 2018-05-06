<?php

namespace Edbizarro\LaravelFacebookAds;

use Edbizarro\LaravelFacebookAds\Entities\AdAccounts;

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
}
