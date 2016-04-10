<?php

namespace Edbizarro\LaravelFacebookAds;

/**
 * Class FacebookAds.
 */
class FacebookAds extends AbstractFacebookAds
{
    /**
     * @return Services\AdAccounts
     */
    public function adAccounts()
    {
        return $this->adAccounts;
    }
}
