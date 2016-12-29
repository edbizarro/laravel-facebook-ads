<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

use FacebookAds\Object\AdSet;
use Edbizarro\LaravelFacebookAds\Services\BaseService;

/**
 * Class AdSetInsights.
 */
class AdSetInsights extends BaseService
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
