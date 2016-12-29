<?php

namespace Edbizarro\LaravelFacebookAds\Services;

use FacebookAds\Object\AdAccount;
use FacebookAds\Object\AdAccountUser;
use FacebookAds\Object\AdUser;
use Illuminate\Support\Collection;

/**
 * Class AdAccounts.
 */
class AdAccounts extends BaseService
{
    /**
     * List all user's ads accounts.
     *
     * @param array  $fields
     * @param string $userId
     *
     * @return Collection
     *
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account
     */
    public function all($fields = [], $userId = 'me')
    {
        $user = $this->getUser($userId);
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
    public function getAds($accountId, $fields = [])
    {
        $account = new AdAccount($accountId);
        $ads = $account->getAds($fields);

        return $this->response($ads);
    }

    /**
     * @param string|int $userId
     *
     * @return AdUser
     *
     * @deprecated use getAccountUser instead
     */
    private function getUser($userId = 'me')
    {
        return new AdUser($userId);
    }

    /**
     * @param string|int $userId
     *
     * @return AdAccountUser
     */
    private function getAccountUser($accountUserId = 'me')
    {
        return new AdAccountUser($accountUserId);
    }
}
