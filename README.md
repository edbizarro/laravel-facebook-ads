# Laravel Facebook Ads

Get ads infos (campaigns, clicks, insights, cost , etc...) from Facebook & Instagram ads API

* Supported Facebook API version: >= v3.0

> API Version <= v2.7 use version 0.8.*

> API Version <= v2.12 use version 0.9.*

---
<p align="center">

![logo](laravel-facebook-ads.png)

</p>

<p align="center">

[![Build Status](https://semaphoreci.com/api/v1/edbizarro/laravel-facebook-ads/branches/master/badge.svg)](https://semaphoreci.com/edbizarro/laravel-facebook-ads)
[![Packagist](https://img.shields.io/packagist/v/edbizarro/laravel-facebook-ads.svg)](https://packagist.org/packages/edbizarro/laravel-facebook-ads) [![Code Climate](https://codeclimate.com/github/edbizarro/laravel-facebook-ads/badges/gpa.svg)](https://codeclimate.com/github/edbizarro/laravel-facebook-ads) [![Codacy Badge](https://api.codacy.com/project/badge/grade/d6deeeac233847dba57afb5c07ccad4b)](https://www.codacy.com/app/edbizarro/laravel-facebook-ads) [![StyleCI](https://styleci.io/repos/55666212/shield)](https://styleci.io/repos/55666212) [![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fedbizarro%2Flaravel-facebook-ads.svg?type=small)](https://app.fossa.io/projects/git%2Bgithub.com%2Fedbizarro%2Flaravel-facebook-ads?ref=badge_shield)

</p>

---

## Installation

Follow this steps to use this package on your Laravel installation

### 1. Require it on composer

```bash
composer require edbizarro/laravel-facebook-ads
```

The package will automatically register it's service provider.

For Laravel <= 5.4 add the provider manually

### 2. Load service provider (optional Laravel <= 5.4 only)

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

If you want to change any configurations, you need to publish the package configuration file. To do this, run ` artisan vendor:publish --provider="Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider"` on terminal.
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

Before using it, it's necessary to initialize the library with an valid [access token](https://developers.facebook.com/docs/facebook-login/access-tokens#usertokens), [php example](https://github.com/facebook/php-graph-sdk/blob/master/docs/examples/facebook_login.md) with: `FacebookAds::init($accessToken);`


Now that everything is set up, it's easy to start using!

#### Example getting all ads

```php
$ads = FacebookAds::adAccounts()->all()->map(function ($adAccount) {
  return $adAccount->ads(
      [
          'name',
          'account_id',
          'account_status',
          'balance',
          'campaign',
          'campaign_id',
          'status'
      ]
  );
});

dd($ads);
```

## Usage

To obtain a list of all `AdAccount` available fields, look at [this](https://github.com/facebook/facebook-php-ads-sdk/blob/master/src/FacebookAds/Object/Fields/AdAccountFields.php).

### adAccounts

To obtain an adAccounts instance:

```php
$adAccounts = $adsApi->adAccounts();
```

#### all

Use this method to retrieve your owned Ad Accounts. This method accepts an array as argument containing a list of fields.

To obtain a list of all available fields, look at [this](https://github.com/facebook/facebook-php-ads-sdk/blob/master/src/FacebookAds/Object/Fields/AdAccountFields.php).

```php
$adAccounts->all(['account_id', 'balance', 'name']);
```

#### get

Use this method to get details of an AdAccount. This method accepts an array as argument containing a list of fields and an account_id `act_<AD_ACCOUNT_ID>`

To obtain a list of all available fields, look at [this](https://github.com/facebook/facebook-php-ads-sdk/blob/master/src/FacebookAds/Object/Fields/AdAccountFields.php).

```php
$adAccounts->get(['account_id', 'balance', 'name'], 'act_<AD_ACCOUNT_ID>');
```


### Campaigns

To obtain an Campaigns instance:

```php
$campaigns = $adsApi->campaigns();
```

#### all

Use this method to retrieve your adAccount campaigns. This method accepts an array as argument containing a list of fields and an account_id `act_<AD_ACCOUNT_ID>`

To obtain a list of all available fields, look at [this](https://github.com/facebook/facebook-php-business-sdk/blob/master/src/FacebookAds/Object/Fields/CampaignFields.php).

```php
$campaigns->all(['name'], 'act_<AD_ACCOUNT_ID>');
```


## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fedbizarro%2Flaravel-facebook-ads.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Fedbizarro%2Flaravel-facebook-ads?ref=badge_large)
