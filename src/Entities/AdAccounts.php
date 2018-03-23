<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use Illuminate\Support\Collection;
use FacebookAds\Object\AdAccountUser;
use Edbizarro\LaravelFacebookAds\Traits\AdAccountFormatter;

/**
 * Class AdAccounts.
 */
class AdAccounts
{
    use AdAccountFormatter;

    /**
     * List all user's ads accounts.
     *
     * @param array  $fields
     * @param string $accountUserId
     *
     * @return Collection
     *
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account
     */
    public function all(array $fields = [], $accountUserId = 'me')
    {
        $accounts = $this->accountUser($accountUserId)->getAdAccounts($fields);

        return $this->format($accounts);
    }

    /**
     * @param string|int $accountUserId
     *
     * @return AdAccountUser
     */
    protected function accountUser($accountUserId = 'me')
    {
        return (new AdAccountUser())->setId($accountUserId);
    }
}
