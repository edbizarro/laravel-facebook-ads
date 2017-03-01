<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use Edbizarro\LaravelFacebookAds\Entities\Ad;
use FacebookAds\Cursor;
use Illuminate\Support\Collection;

/**
 * Class AdFormatter.
 */
trait AdFormatter
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
            $data->push(new Ad($response->current()));
            $response->next();
        }

        return $data;
    }
}
