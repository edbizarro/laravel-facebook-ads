<?php

namespace Edbizarro\LaravelFacebookAds\Services;

use Edbizarro\LaravelFacebookAds\Contracts\InsightsContract;
use Illuminate\Support\Collection;
use FacebookAds\Cursor;

/**
 * Class BaseService.
 */
abstract class BaseService implements InsightsContract
{
    /**
     * Transform a FacebookAds\Cursor object into a Collection.
     *
     * @param Cursor $response
     *
     * @return Collection
     */
    public function response(Cursor $response)
    {
        $data = new Collection();
        while ($response->current()) {
            $data->push($response->current()->getData());
            $response->next();
        }

        return $data;
    }
}
