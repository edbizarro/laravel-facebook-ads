<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use Exception;
use FacebookAds\Cursor;
use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Exceptions\MissingEntityFormatter;

/**
 * Class Formatter.
 */
trait Formatter
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
        if ($this->entity === null) {
            throw new MissingEntityFormatter('To use the FormatterTrait you must provide a entity');
        }

        try {
            $data = new Collection;
            while ($response->current()) {
                $data->push(new $this->entity($response->current()));
                $response->next();
            }

            return $data;
        } catch (Exception $e) {
        }
    }
}
