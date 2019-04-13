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
            case $response instanceof Cursor:
                while ($response->getNext()) {
                    $response->fetchAfter();
                }

                while ($response->valid()) {
                    $data->push($response->current()->exportAllData());
                    $response->next();
                }
                break;
            case $response instanceof AbstractObject:
                $data->push($response->getLastResponse()->getContent()['data']);
                break;
        }

        return $data;
    }
}
