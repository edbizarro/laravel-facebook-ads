<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use FacebookAds\Object\AdAccount;
use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Traits\HasAccountUser;
use Edbizarro\LaravelFacebookAds\Traits\AdAccountFormatter;

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
    public function all(array $fields = [], $accountId = 'me'): Collection
    {
        return $this->format(
            $this->accountUser($accountId)->getAdAccounts($fields)
        );
    }

    /**
     * @param array $fields
     * @param $accountId
     *
     * @return Collection
     * @throws \Edbizarro\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account
     */
    public function get(array $fields, $accountId)
    {
        return $this->format(
            (new AdAccount($accountId))->read($fields)
        );
    }
}
