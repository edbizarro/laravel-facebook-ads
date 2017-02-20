<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

use FacebookAds\Object\Ad;
use Edbizarro\LaravelFacebookAds\Services\BaseService;
use Illuminate\Support\Collection;

/**
 * Class AdsInsights.
 */
class AdInsights extends BaseService
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

        $adObject = new Ad($objectId);
        $insights = $adObject->getInsights($fields, $params);

        return $this->response($insights);
    }
}
