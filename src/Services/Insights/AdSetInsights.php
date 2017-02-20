<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

use FacebookAds\Object\AdSet;
use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Services\BaseService;

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
