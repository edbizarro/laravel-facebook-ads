<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use Illuminate\Support\Collection;
use Edbizarro\LaravelFacebookAds\Traits\AdFormatter;

/**
 * Class AdAccount.
 */
class AdAccount extends AbstractEntity
{
    use AdFormatter;

    /**
     * Get the account ads.
     *
     * @param array $fields
     *
     * @return Collection
     *
     * @see https://developers.facebook.com/docs/marketing-api/reference/adgroup#Reading
     * @throws \Edbizarro\LaravelFacebookAds\Exceptions\MissingEntityFormatter
     */
    public function ads(array $fields = []): Collection
    {
        return $this->format(
            $this->response->getAds($fields)
        );
    }
}
