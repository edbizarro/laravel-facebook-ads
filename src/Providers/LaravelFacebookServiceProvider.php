<?php

namespace Edbizarro\LaravelFacebookAds\Providers;

use Illuminate\Support\ServiceProvider;
use Edbizarro\LaravelFacebookAds\FacebookAds;
use Edbizarro\LaravelFacebookAds\Contracts\LaravelFacebookAdsContract;

/**
 * Class LaravelFacebookServiceProvider.
 */
class LaravelFacebookServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $configPath = __DIR__.'/../../config/facebook-ads.php';

        if ($this->isLumen() === false) {
            $this->publishes([$configPath => config_path('facebook-ads.php')]);
        }

        if ($this->isLumen()) {
            $this->app->configure('facebook-ads');
        }

        $this->mergeConfigFrom($configPath, 'facebook-ads');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(LaravelFacebookAdsContract::class, function ($app) {
            return $this->createInstance();
        });

        $this->app->singleton('facebook-ads', function ($app) {
            return $this->createInstance();
        });
    }

    /**
     * @return FacebookAds
     */
    protected function createInstance()
    {
        return new FacebookAds;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['facebook-ads'];
    }

    /**
     * @return bool
     */
    private function isLumen()
    {
        return true === str_contains($this->app->version(), 'Lumen');
    }
}
