<?php

namespace Edbizarro\LaravelFacebookAds\Facades;

use Illuminate\Support\Facades\Facade;

class FacebookAds extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'facebook-ads';
    }
}
