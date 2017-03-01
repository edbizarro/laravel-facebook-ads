<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use FacebookAds\Cursor;
use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Entities\AdAccount;

/**
 * Class AdAccountFormatter.
 */
trait AdAccountFormatter
{
    /**
     * Transform a FacebookAds\Cursor object into a Collection.
     *
     * @param Cursor $response
     *
     * @return Collection
     */
    protected function format(Cursor $response)
    {
        $data = new Collection;
        while ($response->current()) {
            $data->push(new AdAccount($response->current()));
            $response->next();
        }

        return $data;
    }
}
