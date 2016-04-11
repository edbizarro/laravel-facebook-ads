# Laravel Facebook Ads

[![Packagist](https://img.shields.io/packagist/v/edbizarro/laravel-facebook-ads.svg?maxAge=2592000)](https://packagist.org/packages/edbizarro/laravel-facebook-ads) [![Total Downloads](http://img.shields.io/packagist/dm/edbizarro/laravel-facebook-ads.svg)](https://packagist.org/packages/edbizarro/laravel-facebook-ads) [![Build Status](http://img.shields.io/travis/edbizarro/laravel-facebook-ads.svg)](https://travis-ci.org/edbizarro/laravel-facebook-ads) [![Codacy Badge](https://api.codacy.com/project/badge/grade/d6deeeac233847dba57afb5c07ccad4b)](https://www.codacy.com/app/edbizarro/laravel-facebook-ads) [![StyleCI](https://styleci.io/repos/55666212/shield)](https://styleci.io/repos/55666212) [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/edbizarro/laravel-facebook-ads/master/LICENSE)

## Usage

Follow this steps to use this package on your Laravel installation

### 1. Require it on composer

```bash
composer require edbizarro/laravel-facebook-ads
```

### 2. Load service provider

You need to update your `config/app.php` configuration file to register our service provider, adding this line on `providers` array:

```php
Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider::class
```

### 3. Enable the facade (optional)

This package comes with an facade to make the usage easier. To enable it, add this line at `config/app.php` on `alias` array:

```php
'FacebookAds' => Edbizarro\LaravelFacebookAds\Facades\FacebookAds::class
```

## Configuration

If you want to change any configurations, you need to publish the package configuration file. To do this, run `php artisan vendor:publish` on terminal.
This will publish a `facebook-ads.php` file on your configuration folder like this:

```php
<?php
return [
    'app_id' => env('FB_ADS_APP_ID'),
    'app_secret' => env('FB_ADS_APP_SECRET'),
];
```

Note that this file uses environment variables, it's a good practice put your secret keys on your `.env` file adding this lines on it:


```
FB_ADS_APP_ID="YOUR_APP_ID"
FB_ADS_APP_SECRET="YOUR_APP_SECRET_KEY"
```

## First steps

Now that everything is set up, it's easy to start using!

This package is slit in services to make easy to acess things. At this moment, we just have the `addAccounts` serivice.

Before using it, it's necessary to initialize the library with an valid access token.


```php
<?php
/** Your controller */

use Edbizarro\LaravelFacebookAds\FacebookAds;

...

public function yourMethod(FacebookAds $ads)
{
    $adsApi = $ads->init($accessToken);
}
...
```

### adAccounts

To obtain an adAccounts instance:

```php
$adAccounts = $adsApi->adAccounts();
```

#### list

Use this method to retrieve your owned Ad Accounts. This methods accepts an array as argument containing a list of fields.

To obtain a list of all available fields, take a read on [this](https://github.com/facebook/facebook-php-ads-sdk/blob/master/src/FacebookAds/Object/Fields/AdAccountFields.php).

```php
$adAccounts->list(['account_id', 'balance', 'name']);
```

#### getAds

Use this method to retrieve an account ads. This method requires an `account_id` and a list of fields to be retrieved.

To obtain a list of all available fields, take a read on [this](https://github.com/facebook/facebook-php-ads-sdk/blob/master/src/FacebookAds/Object/Fields/AdFields.php).

```php
$adAccounts->getAds('account_XXXX', ['name', 'adset_id', 'targeting']);
```
