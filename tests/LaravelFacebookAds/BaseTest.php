<?php

namespace LaravelFacebookAds\Tests;

use Edbizarro\LaravelFacebookAds\Services\AdAccounts;
use Edbizarro\LaravelFacebookAds\Services\Insights\Insights;
use Illuminate\Support\Collection;
use Orchestra\Testbench\TestCase;
use Edbizarro\LaravelFacebookAds\FacebookAds;
use Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider;
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

        $this->createAdUserMock();
        $this->createSdkAdAccountMock();
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

    protected function createSdkAdAccountMock()
    {
        $fbAdAccount = m::mock('overload:FacebookAds\Object\AdAccount');
        $fbAdAccount
            ->shouldReceive('getAds')
            ->withAnyArgs();

        $fbAdAccount
            ->shouldReceive('getInsights')
            ->withAnyArgs();

        return $fbAdAccount;
    }
    /**
     * @return m\MockInterface
     */
    protected function createAdUserMock()
    {
        $adUser = m::mock('overload:FacebookAds\Object\AdUser');

        $adUser
            ->shouldReceive('getAdAccounts')
            ->withAnyArgs();

        return $adUser;
    }
}
