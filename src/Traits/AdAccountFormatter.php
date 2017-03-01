<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use FacebookAds\Cursor;
use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Entities\AdAccount;

/**
 * Class AdAccountFormatter.
 */
trait AdAccountFormatter
{
    use Formatter;

    protected $entity = AdAccount::class;
}
