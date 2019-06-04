<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use FacebookAds\Object\AdAccount as FbAdAccount;
use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Traits\AdAccountFormatter;

/**
 * Class AdAccounts.
 */
class InstagramAccounts
{
    use AdAccountFormatter;

    /**
     * List all instagram accounts.
     *
     * @param array $fields
     * @param string $accountId
     *
     * @return Collection
     *
     * @throws \Edbizarro\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/guides/instagramads
     */
    public function all(array $fields, string $accountId): Collection
    {
        return $this->format(
            (new FbAdAccount)->setId($accountId)->getInstagramAccounts($fields)
        );
    }

    /**
     * @param array $fields
     * @param $accountId
     *
     * @return Collection
     *
     * @throws \Edbizarro\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account
     */
    public function get(array $fields, $accountId)
    {
        return $this->format(
            (new FbAdAccount($accountId))->getSelf($fields)
        );
    }
}
