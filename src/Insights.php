<?php

namespace Edbizarro\LaravelFacebookAds;

use FacebookAds\Object\Ad;
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\AdSet;
use FacebookAds\Object\Campaign;
use FacebookAds\Object\Values\AdsInsightsLevelValues;

class Insights
{
    use FormatResponse;

    public function get(
        Period $period,
        $accountId,
        $level,
        array $params
    ) {
        $levelClass = $this->selectClassByLevel($level, $accountId);

        $fields = $params['fields'];

        $params['time_increment'] = $params['time_increment'] ?? '1';
        $params['limit']          = $params['limit'] ?? 100;
        $params['level']          = $level;
        $params['time_range']     = [
            'since' => $period->startDate->format('Y-m-d'),
            'until' => $period->endDate->format('Y-m-d'),
        ];

        $apiResponse = $levelClass->getInsights($fields, $params);

        return $this->format($apiResponse);
    }

    /**
     * @param string $level
     * @param $accountId
     *
     * @return Ad|Campaign|AdSet|AdAccount
     */
    protected function selectClassByLevel(string $level, string $accountId)
    {
        switch ($level) {
            case AdsInsightsLevelValues::AD:
                return (new Ad)->setId($accountId);
                break;
            case AdsInsightsLevelValues::CAMPAIGN:
                return (new Campaign)->setId($accountId);
                break;
            case AdsInsightsLevelValues::ADSET:
                return (new AdSet)->setId($accountId);
                break;
            case AdsInsightsLevelValues::ACCOUNT:
                return (new AdAccount)->setId($accountId);
                break;
        }
    }
}
