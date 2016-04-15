<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

use Edbizarro\LaravelFacebookAds\Contracts\InsightsContract;
use Edbizarro\LaravelFacebookAds\Services\BaseService;
use FacebookAds\Object\AdSet;

/**
 * Class AdSetInsights.
 */
class AdSetInsights extends BaseService implements InsightsContract
{
    /**
     * @param mixed $objectId
     * @param array $params
     *
     * @return \Illuminate\Support\Collection
     */
    public function getInsights($objectId, $params = [])
    {
        $fields = $params['fields'];
        unset($params['fields']);
        $adSet = new AdSet($objectId);
        $insights = $adSet->getInsights($fields, $params);

        return $this->response($insights);
    }
}
