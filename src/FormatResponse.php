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

        switch (true) {
            case is_array($response):
                foreach ($response as $responseObject) {
                    foreach ($responseObject->getLastResponse()->getContent() as $items) {
                        foreach ($items as $item) {
                            $data->push($item);
                        }
                    }
                }
                break;
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
    }
}
