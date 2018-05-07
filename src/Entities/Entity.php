<?php

namespace Edbizarro\LaravelFacebookAds\Entities;

/**
 * Class Entity.
 */
abstract class Entity
{
    protected $response = [];

    public function __construct($class = [])
    {
        $this->response = $class;
    }

    public function rawResponse()
    {
        return $this->response;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->response->getData())) {
            return $this->response->getData()[$name];
        }
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->response->getData();
    }
}
