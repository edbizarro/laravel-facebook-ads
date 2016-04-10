<?php

namespace Edbizarro\LaravelFacebookAds\Services;

use FacebookAds\Object\AdUser;

/**
 * Class AdAccounts.
 */
class AdAccounts extends BaseService
{
    /**
     * List all user's ads accounts
     * 
     * @param array $fields
     * @param string $userId
     * @return \Illuminate\Support\Collection
     */
    public function list($fields = [], $userId = 'me')
    {
        $user = new AdUser($userId, $this->adsApiInstance);
        $accounts = $user->getAdAccounts($fields);

        return $this->response($accounts);
    }
}
