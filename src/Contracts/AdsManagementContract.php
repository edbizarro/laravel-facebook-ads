<?php

namespace Edbizarro\LaravelFacebookAds\Contracts;

interface AdsManagementContract
{
    public function read($accountId, $fields = []);
}
