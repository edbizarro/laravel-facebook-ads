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
     * @param string $type   Valid types are 'ad', 'ad_account', 'campaign', 'ad_set'
     * @param array  $params
     *
     * @return \Illuminate\Support\Collection
     */
    public function get($type, $params = [])
    {
        switch ($type) {
            case 'ad_ccount':
                return (new AdInsights())->getInsights($params);
                break;
        }
    }
}
