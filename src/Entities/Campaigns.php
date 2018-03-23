<?php

namespace Edbizarro\LaravelFacebookAds\Services;

use FacebookAds\Object\AdAccount;
use Illuminate\Support\Collection;

/**
 * Class Campaigns.
 */
class Campaigns
{
    /**
     * List all campaigns.
     *
     * @param array  $fields
     * @param string $accountId
     *
     * @return Collection
     *
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account/campaigns
     */
    public function all(array $fields, $accountId)
    {
        $campaigns = (new AdAccount($accountId))->getCampaigns($fields);

        return $this->response($campaigns);
    }
}
