<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
use Edbizarro\LaravelFacebookAds\Traits\AdFormatter;
use FacebookAds\Object\AdAccount as FacebookAdAccount;

/**
 * Class AdAccount.
 */
class AdAccount extends Entity implements Arrayable
{
    use AdFormatter;

    /**
     * @var FacebookAdAccount
     */
    protected $facebookAdAccount = [];

    /**
     * AdAccount constructor.
     *
     * @param FacebookAdAccount $facebookAdAccount
     */
    public function __construct(FacebookAdAccount $facebookAdAccount)
    {
        $this->facebookAdAccount = $facebookAdAccount;
    }

    /**
     * Get the account ads.
     *
     * @param array $fields
     *
     * @return Collection
     *
     * @see https://developers.facebook.com/docs/marketing-api/reference/adgroup#Reading
     */
    public function ads($fields = [])
    {
        $ads = $this->facebookAdAccount->getAds($fields);

        return $this->format($ads);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->facebookAdAccount->getData())) {
            return $this->facebookAdAccount->getData()[$name];
        }
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->facebookAdAccount->getData();
    }
}
