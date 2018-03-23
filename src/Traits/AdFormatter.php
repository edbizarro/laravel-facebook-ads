<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use Edbizarro\LaravelFacebookAds\Entities\Ad;

/**
 * Class AdFormatter.
 */
trait AdFormatter
{
    use Formatter;

    protected $entity = Ad::class;
}
