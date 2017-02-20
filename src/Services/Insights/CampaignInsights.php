<?php

namespace Edbizarro\LaravelFacebookAds\Services\Insights;

use FacebookAds\Object\Campaign;
use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Services\BaseService;

/**
 * Class CampaignInsights.
 */
class CampaignInsights extends BaseService
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

        $campaign = new Campaign($objectId);
        $insights = $campaign->getInsights($fields, $params);

        return $this->response($insights);
    }
}
