<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Traits\AdAccountFormatter;
use Edbizarro\LaravelFacebookAds\Traits\HasAccountUser;

/**
 * Class AdAccounts.
 */
class AdAccounts
{
    use AdAccountFormatter,
        HasAccountUser;

    /**
     * List all user's ads accounts.
     *
     * @param array $fields
     * @param string $accountUserId
     *
     * @return Collection
     *
     * @throws \Edbizarro\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account
     */
    public function all(array $fields = [], $accountUserId = 'me'): Collection
    {
        $accounts = $this->accountUser($accountUserId)->getAdAccounts($fields);

        return $this->format($accounts);
    }
}
