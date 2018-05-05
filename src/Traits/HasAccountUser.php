<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use FacebookAds\Object\AdAccountUser;

trait HasAccountUser
{
    /**
     * @param string|int $accountUserId
     *
     * @return AdAccountUser
     */
    protected function accountUser($accountUserId = 'me'): AdAccountUser
    {
        return (new AdAccountUser)->setId($accountUserId);
    }
}
