<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

use Edbizarro\LaravelFacebookAds\Services\BaseService;

/**
 * Class Insights.
 */
class Insights extends BaseService
{
    /**
     * Get insights from Ads, AdAccounts, Campaigns and AdSets.
     *
     * @param $objectType Valid types are 'ad', 'ad_account', 'campaign', 'ad_set'
     * @param $objectId
     * @param array $params
     * @return \Illuminate\Support\Collection
     */
    public function get($objectType, $objectId, $params = [])
    {
        switch ($objectType) {
            case 'ad_account':
                return (new AdInsights())->getInsights($objectId, $params);
                break;
        }
    }
}
