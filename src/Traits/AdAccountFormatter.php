<?php

namespace Edbizarro\LaravelFacebookAds\Traits;

use Edbizarro\LaravelFacebookAds\Entities\AdAccount;

/**
 * Class AdAccountFormatter.
 */
trait AdAccountFormatter
{
    use Formatter;

    protected $entity = AdAccount::class;
}
