<?php

namespace LaravelFacebookAds\Tests;

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
        $this->createAdUserMock();
        parent::setUp();
    }

    /**
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [LaravelFacebookServiceProvider::class];
    }

    /**
     * @return FacebookAds
     */
    protected function createFacebookAdsInstance()
    {
        return new FacebookAds(
            $this->createAdAccountsMock(),
            $this->createInsightsMock()
        );
    }

    /**
     * @return m\MockInterface
     */
    protected function createAdAccountsMock()
    {
        $adAccounts = m::mock('Edbizarro\LaravelFacebookAds\Services\AdAccounts');

        $adAccounts
            ->shouldReceive('response')
            ->withAnyArgs()
            ->andReturn('\Illuminate\Support\Collection');

        $adAccounts
            ->shouldReceive('all')
            ->with(array(0 => 'name'))
            ->andReturn('\Illuminate\Support\Collection');

        $adAccounts
            ->shouldReceive('getAds')
            ->with(1, array(0 => 'name'))
            ->andReturn('\Illuminate\Support\Collection');

        return $adAccounts;
    }

    /**
     * @return m\MockInterface
     */
    protected function createInsightsMock()
    {
        return $insights = m::mock('Edbizarro\LaravelFacebookAds\Services\Insights\Insights');
    }

    /**
     * @return m\MockInterface
     */
    protected function createAdUserMock()
    {
        $adUser = m::mock('overload:FacebookAds\Object\AdUser');

        $adUser
            ->shouldReceive('getAdAccounts')
            ->withAnyArgs()
            ->andReturn();

        return $adUser;
    }
}
