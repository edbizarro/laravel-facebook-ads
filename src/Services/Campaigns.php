<?php

namespace Edbizarro\LaravelFacebookAds\Services;

use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Campaign;
use Illuminate\Support\Collection;
use FacebookAds\Object\AdAccountUser;

/**
 * Class Campaigns.
 */
class Campaigns extends BaseService
{
    /**
     * List all user's ads accounts.
     *
     * @param array  $fields
     * @param string $accountUserId
     *
     * @return Collection
     *
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account/campaigns
     */
    public function all(array $fields = [], $accountId)
    {


        return $this->response($accounts);
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
