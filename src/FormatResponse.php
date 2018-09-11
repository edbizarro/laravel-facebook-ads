<?php

namespace Edbizarro\LaravelFacebookAds;

use FacebookAds\Cursor;
use Illuminate\Support\Collection;
use FacebookAds\Object\AbstractObject;

trait FormatResponse
{
    protected function format(Cursor $response)
    {
        $data = null;

        try {
            switch (true) {
                case $response instanceof Cursor:
                    $data = new Collection;

                    foreach ($response->getLastResponse()->getContent() as $item) {
                        $data->push($item);
                    }
                    break;
                case $response instanceof AbstractObject:
                    $data = $response->getLastResponse()->getContent();
                    break;
            }

            return $data;
        } catch (Exception $e) {
            return collect();
        }
    }
}
