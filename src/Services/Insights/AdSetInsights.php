<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

use FacebookAds\Object\AdSet;
use Edbizarro\LaravelFacebookAds\Services\BaseService;
use Illuminate\Support\Collection;

/**
 * Class AdSetInsights.
 */
class AdSetInsights extends BaseService
{
    /**
     * Get insights from a especified object type.
     *
     * @param mixed $objectId
     * @param array $params
     *
     * @return Collection
     */
    public function insights($objectId, $params = [])
    {
        $fields = $params['fields'];
        unset($params['fields']);

        $adSet = new AdSet($objectId);
        $insights = $adSet->getInsights($fields, $params);

        return $this->response($insights);
    }
}
