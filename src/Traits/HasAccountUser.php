<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use FacebookAds\Object\User;

trait HasAccountUser
{
    /**
     * @param string|int $accountUserId
     *
     * @return User
     */
    protected function accountUser($accountUserId = 'me'): User
    {
        return (new User)->setId($accountUserId);
    }
}
