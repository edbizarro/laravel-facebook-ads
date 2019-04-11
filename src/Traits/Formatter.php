<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use Edbizarro\LaravelFacebookAds\Exceptions\MissingEntityFormatter;
use Exception;
use FacebookAds\Cursor;
use FacebookAds\Object\AbstractObject;
use Illuminate\Support\Collection;

/**
 * Class Formatter.
 */
trait Formatter
{
    /**
     * ProcessTransform a FacebookAds\Cursor object into a Collection.
     *
     * @param Cursor|AbstractObject $response
     *
     * @return Collection|AbstractObject
     * @throws MissingEntityFormatter
     */
    protected function format($response)
    {
        $data = null;

        if ($this->entity === null) {
            throw new MissingEntityFormatter('To use the FormatterTrait you must provide a entity');
        }

        try {
            switch (true) {
                case $response instanceof Cursor:
                    $data = new Collection;
                    while ($response->current()) {
                        $data->push(new $this->entity($response->current()));
                        $response->next();
                    }
                    break;
                case $response instanceof AbstractObject:
                    $data = new $this->entity($response);
                    break;
            }

            return $data;
        } catch (Exception $e) {
            return collect();
        }
    }
}
