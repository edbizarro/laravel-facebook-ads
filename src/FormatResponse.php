<?php

namespace Edbizarro\LaravelFacebookAds;

use FacebookAds\Cursor;
use Illuminate\Support\Collection;
use FacebookAds\Object\AbstractObject;

trait FormatResponse
{
    protected function format(Cursor $response)
    {
        $data = new Collection;

        try {
            switch (true) {
                case $response instanceof Cursor:
                    foreach ($response->getLastResponse()->getContent() as $items) {
                        foreach ($items as $item) {
                            $data->push($item);
                        }
                    }
                    break;
                case $response instanceof AbstractObject:
                    $data->push($response->getLastResponse()->getContent());
                    break;
            }

            return $data;
        } catch (Exception $e) {
            return collect();
        }
    }
}
