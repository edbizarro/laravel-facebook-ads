<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use Edbizarro\LaravelFacebookAds\Entities\Ad;
use FacebookAds\Cursor;
use Illuminate\Support\Collection;

/**
 * Class AdFormatter.
 */
trait AdFormatter
{
    use Formatter;

    protected $entity = Ad::class;
}
