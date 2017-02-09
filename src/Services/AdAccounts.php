<?php

namespace Edbizarro\LaravelFacebookAds\Services;

use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Campaign;
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
        $user = $this->getAccountUser($accountUserId);
        $accounts = $user->getAdAccounts($fields);

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
        $account = new AdAccount($accountId);
        $ads = $account->getAds($fields);

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
     * @param $accountId
     * @return Campaign
     */
    protected function campaigns($accountId)
    {
        return new Campaign($accountId);
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
