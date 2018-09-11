<?php

namespace Edbizarro\LaravelFacebookAds;


use FacebookAds\Object\Ad;
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\AdSet;
use FacebookAds\Object\Campaign;

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
        unset($params['fields']);

        $params['time_range'] = [
            'since' => $period->startDate->format('Y-m-d'),
            'until' => $period->endDate->format('Y-m-d'),
        ];

        return $this->format($levelClass->getInsights($fields, $params));
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
            case 'ad':
                return new Ad($accountId);
                break;
            case 'campaign':
                return new Campaign($accountId);
                break;
            case 'adset':
                return new AdSet($accountId);
                break;
            case 'account':
                return new AdAccount($accountId);
                break;
        }
    }
}
