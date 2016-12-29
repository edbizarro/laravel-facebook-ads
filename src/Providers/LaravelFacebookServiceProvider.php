<?php

namespace Edbizarro\LaravelFacebookAds\Providers;

use Illuminate\Support\ServiceProvider;
use Edbizarro\LaravelFacebookAds\FacebookAds;
use Edbizarro\LaravelFacebookAds\Services\AdAccounts;
use Edbizarro\LaravelFacebookAds\Services\Insights\Insights;
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
            return $this->createInstance($app);
        });

        $this->app->singleton('facebook-ads', function ($app) {
            return $this->createInstance($app);
        });
    }

    /**
     * @param $app
     *
     * @return FacebookAds
     */
    protected function createInstance($app)
    {
        return new FacebookAds(
            (new AdAccounts()),
            (new Insights())
        );
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
