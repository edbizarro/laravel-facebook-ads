<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

use Edbizarro\LaravelFacebookAds\Contracts\InsightsContract;
use Edbizarro\LaravelFacebookAds\Services\BaseService;
use FacebookAds\Object\AdAccount;

/**
 * Class AdsInsights.
 */
class AdInsights extends BaseService implements InsightsContract
{
    /**
     * @param mixed $objectId
     * @param array $params
     * @return \Illuminate\Support\Collection
     */
    public function getInsights($objectId, $params = [])
    {
        $fields = $params['fields'];
        unset($params['fields']);
        $account = new AdAccount($objectId);
        $insights = $account->getInsights($fields, $params);

        return $this->response($insights);
    }
}
