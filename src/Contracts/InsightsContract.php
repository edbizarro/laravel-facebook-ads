<?php

namespace Edbizarro\LaravelFacebookAds\Contracts;

/**
 * Interface InsightsContract.
 */
interface InsightsContract
{
    /**
     * Get insights from a especified object type.
     *
     * @param mixed $id
     * @param array $params
     * @return mixed
     */
    public function getInsights($id, $params = []);
}
