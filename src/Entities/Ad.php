<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use Edbizarro\LaravelFacebookAds\Traits\AdFormatter;
use FacebookAds\Object\Ad as FacebookAd;

/**
 * Class Ad.
 */
class Ad extends Entity
{
    use AdFormatter;
}
