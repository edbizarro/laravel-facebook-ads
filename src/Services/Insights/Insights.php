<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

/**
 * Class Insights.
 */
class Insights
{
    /**
     * Get insights from Ads, AdAccounts, Campaigns or AdSets.
     *
     * @param string $objectType valid types are 'ad', 'ad_account', 'campaign', 'ad_set'
     * @param string $objectId
     * @param array $params
     *
     * @return \Illuminate\Support\Collection
     */
    public function get($objectType, $objectId, $params = [])
    {
        switch ($objectType) {
            case 'ad_account':
                return (new AdAccountInsights())->insights($objectId, $params);
                break;

            case 'campaign':
                return (new CampaignInsights())->insights($objectId, $params);
                break;

            case 'ad_set':
                return (new AdSetInsights())->insights($objectId, $params);
                break;

            case 'ad':
                return (new AdInsights())->insights($objectId, $params);
                break;
        }
    }
}
