<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use FacebookAds\Object\Ad as FacebookAd;

/**
 * Class Ad.
 */
class Ad extends Entity
{
    /**
     * @var FacebookAd
     */
    protected $facebookAd = [];

    /**
     * AdAccount constructor.
     *
     * @param FacebookAd $facebookAd
     */
    public function __construct(FacebookAd $facebookAd)
    {
        $this->facebookAd = $facebookAd;
    }
    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->facebookAd->getData())) {
            return $this->facebookAd->getData()[$name];
        }
    }
}
