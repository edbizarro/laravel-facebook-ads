<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use Edbizarro\LaravelFacebookAds\Traits\AdFormatter;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

/**
 * Class AdAccount.
 */
class AdAccount extends AbstractEntity implements Arrayable
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
        $ads = $this->response->getAds($fields);

        return $this->format($ads);
    }
}
