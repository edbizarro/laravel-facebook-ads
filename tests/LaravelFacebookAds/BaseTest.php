<?php

namespace LaravelFacebookAds\Tests;

use Edbizarro\LaravelFacebookAds\Services\AdAccounts;
use Edbizarro\LaravelFacebookAds\Services\Insights\Insights;
use Illuminate\Support\Collection;
use Orchestra\Testbench\TestCase;
use Edbizarro\LaravelFacebookAds\FacebookAds;
use Mockery as m;

/**
 * Class BaseTest.
 */
abstract class BaseTest extends TestCase
{
    /**
     * @var FacebookAds
     */
    protected $laravelFacebookAds;

    public function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function setUp()
    {
        $baseService = m::mock('overload:Edbizarro\LaravelFacebookAds\Services\BaseService');
        $baseService
            ->shouldReceive('response')
            ->withAnyArgs()
        ->andReturn((new Collection()));

        $this->createSdkAdUserMock();
        $this->createSdkAdAccountMock();
        $this->createSdkAdMock();
        $this->createSdkCampaignMock();
        $this->createSdkAdSetMock();
        parent::setUp();
    }

    /**
     * @return FacebookAds
     */
    protected function createFacebookAdsInstance()
    {
        return new FacebookAds(
            (new AdAccounts()),
            (new Insights())
        );
    }

    protected function createSdkAdMock()
    {
        $sdkAd = m::mock('overload:FacebookAds\Object\Ad');

        $sdkAd
            ->shouldReceive('getInsights')
            ->with([0 => 'start_date'], []);

        return $sdkAd;
    }

    protected function createSdkCampaignMock()
    {
        $campaign = m::mock('overload:FacebookAds\Object\Campaign');

        $campaign
            ->shouldReceive('getInsights')
            ->with([0 => 'start_date'], []);

        return $campaign;
    }

    protected function createSdkAdSetMock()
    {
        $campaign = m::mock('overload:FacebookAds\Object\AdSet');

        $campaign
            ->shouldReceive('getInsights')
            ->with([0 => 'id'], []);

        return $campaign;
    }

    protected function createSdkAdAccountMock()
    {
        $fbAdAccount = m::mock('overload:FacebookAds\Object\AdAccount');
        $fbAdAccount
            ->shouldReceive('getAds')
            ->withAnyArgs();

        $fbAdAccount
            ->shouldReceive('getInsights')
            ->withAnyArgs();

        $fbAdAccount
            ->shouldReceive('getCampaigns')
            ->withAnyArgs();

        return $fbAdAccount;
    }

    /**
     * @return m\MockInterface
     */
    protected function createSdkAdUserMock()
    {
        $adUser = m::mock('overload:FacebookAds\Object\AdAccountUser');

        $adUser
            ->shouldReceive('getAdAccounts')
            ->withAnyArgs();

        return $adUser;
    }
}
