<?php

namespace Edbizarro\LaravelFacebookAds\Services;

use FacebookAds\Api;
use Illuminate\Support\Collection;
use FacebookAds\Cursor;

/**
 * Class BaseService.
 */
class BaseService
{
    /**
     * @var Api|null
     */
    protected $adsApiInstance;

    /**
     * BaseService constructor.
     *
     * @param Api $adsApiInstance
     */
    public function __construct(Api $adsApiInstance)
    {
        $this->adsApiInstance = $adsApiInstance;
    }

    /**
     * Transform a FacebookAds\Cursor object into a Collection.
     *
     * @param Cursor $response
     * @return Collection
     */
    public function response(Cursor $response)
    {
        $data = new Collection();
        while ($response->current()) {
            $data->push($response->current()->getData());
            $response->next();
        }

        return new Collection($data);
    }
}
