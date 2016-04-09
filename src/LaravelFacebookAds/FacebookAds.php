<?php

namespace LaravelFacebookAds;

use FacebookAds\Api;
use Facebook\Facebook;

/**
 * Class FacebookAds.
 */
class FacebookAds
{
    /**
     * @var Facebook
     */
    protected $fbClient;

    /**
     * FacebookConnect constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $config = array_merge([
            'app_id' => '',
            'app_secret' => '',
            'default_graph_version' => Facebook::DEFAULT_GRAPH_VERSION,
            'enable_beta_mode' => false,
            'http_client_handler' => null,
            'persistent_data_handler' => null,
            'pseudo_random_string_generator' => null,
            'url_detection_handler' => null,
        ], $config);

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->fbClient = new Facebook($config);
    }
}
