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
     *
     * @return \Illuminate\Support\Collection
     */
    public function get($objectType, $objectId, $params = [])
    {
        switch ($objectType) {
            case 'ad_account':
                return (new AdAccountInsights())->getInsights($objectId, $params);
                break;

            case 'campaign':
                return (new CampaignInsights())->getInsights($objectId, $params);
                break;

            case 'ad_set':
                return (new AdSetInsights())->getInsights($objectId, $params);
                break;

            case 'ad':
                return (new AdInsights())->getInsights($objectId, $params);
                break;
        }
    }
}
