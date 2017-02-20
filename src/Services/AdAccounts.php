<?php

namespace Edbizarro\LaravelFacebookAds\Services;

use FacebookAds\Object\AdAccount;
use Illuminate\Support\Collection;
use FacebookAds\Object\AdAccountUser;

/**
 * Class AdAccounts.
 */
class AdAccounts extends BaseService
{
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

        return $this->response($accounts);
    }

    /**
     * @param $accountId
     * @param array $fields
     *
     * @return Collection
     *
     * @see https://developers.facebook.com/docs/marketing-api/reference/adgroup#Reading
     */
    public function ads($accountId, $fields = [])
    {
        $ads = (new AdAccount($accountId))->getAds($fields);

        return $this->response($ads);
    }

    /**
     * @deprecated use ads instead
     */
    public function getAds($accountId, $fields = [])
    {
        return $this->ads($accountId, $fields);
    }

    /**
     * @param string|int $accountUserId
     *
     * @return AdAccountUser
     */
    protected function accountUser($accountUserId = 'me')
    {
        return new AdAccountUser($accountUserId);
    }

    /**
     * @deprecated use accountUser instead
     */
    protected function getAccountUser($accountUserId = 'me')
    {
        return $this->accountUser($accountUserId);
    }

    /**
     * @return Campaigns
     */
    public function campaigns()
    {
        return new Campaigns;
    }

    /**
     * @param mixed $objectId
     * @param array $params
     *
     * @return mixed
     */
    public function insights($objectId, $params = [])
    {
        // @TODO
    }
}
