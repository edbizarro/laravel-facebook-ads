<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use FacebookAds\Object\AdAccount;
use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Traits\Formatter;

/**
 * Class Campaigns.
 */
class Insights
{
    use Formatter;

    protected $entity = Campaign::class;

    /**
     * List all campaigns.
     *
     * @param array $fields
     * @param string $accountId *
     *
     * @return \FacebookAds\Object\AbstractObject|Collection
     *
     * @throws \Edbizarro\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account/campaigns
     */
    public function all(array $fields, string $accountId)
    {
        return $this->format(
            (new AdAccount)->setId($accountId)->getCampaigns($fields)
        );
    }
}
