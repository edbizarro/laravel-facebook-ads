<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

use FacebookAds\Object\Ad;
use Edbizarro\LaravelFacebookAds\Services\BaseService;

/**
 * Class AdsInsights.
 */
class AdInsights extends BaseService
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

        $ad = new Ad($objectId);
        $insights = $ad->getInsights($fields, $params);

        return $this->response($insights);
    }
}
