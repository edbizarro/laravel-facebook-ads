Laravel Facebook Ads
====

[![Latest Stable Version](http://img.shields.io/github/release/edbizarro/laravel-facebook-ads.svg)](https://packagist.org/packages/edbizarro/laravel-facebook-ads) [![Total Downloads](http://img.shields.io/packagist/dm/edbizarro/laravel-facebook-ads.svg)](https://packagist.org/packages/edbizarro/laravel-facebook-ads) [![Build Status](http://img.shields.io/travis/edbizarro/laravel-facebook-ads.svg)](https://travis-ci.org/edbizarro/laravel-facebook-ads)

Instalação
------------

O primeiro passo usar o composer para instalar este package e todas as suas dependências, para isso utilizaremos o comando abaixo:

```bash
composer require edbizarro/laravel-facebook-ads
```

Laravel
-------

### Provider
Após a instalação de todas as dependências você precisará registrar o Laravel Facebook Ads em sua aplicação editando o arquivo ```config/app.php``` e adicionando a linha abaixo na seção de `'providers'`:

```
Edbizarro\LaravelFacebookAds\Providers\LaravelFacebookServiceProvider::class
```

### Facade
Este package vem com uma Facade para facilitar o acesso as funções
> Opcional: Esta etapa é opcional, este package não necessida da Facade para funcionar

Edite o arquivo ```config/app.php``` e adicione a linha abaixo na seção ```'alias'```

```'FacebookAds' => Edbizarro\LaravelFacebookAds\Facades\FacebookAds::class```

### Configuração

Para publicar as configurações rode o comando ```php artisan vendor:publish```, feito isso você verá arquivo `config/facebook-ads.php`

```php
# config/facebook-ads.php
<?php
return [
    'app_id' => env('FB_ADS_APP_ID'),
    'app_secret' => env('FB_ADS_APP_SECRET'),
];
```

Note que que o arquivo faz uso de variáveis de ambiente, é uma boa prática deixar seus dados confidenciais em seu arquivo ```.env```, edite o arquivo ```.env``` que está na raiz do seu projeto e adicione as informações de seu APP do facebook

```
FB_ADS_APP_ID="SEU APP ID"
FB_ADS_APP_SECRET="SEU APP SECRET"
```

### Usando este package

Agora chegamos a parte divertida, vamos lá:

Este package é dividido em 'services' para facilitar o acesso as informações, por hora temos somente o service 'adAccounts'

Antes de começar a utilizar será necessário inicializar a biblioteca com um 'access_token' válido

```php
<?php
#controller

use Edbizarro\LaravelFacebookAds\FacebookAds;

public function something(FacebookAds $ads)
{
    $adsApi = $ads->init($accessToken);
}
```

#### AdAccounts

##### Obtendo uma instância de adAccounts
```php
<?php
#controller

$adAccounts = $adsApi->adAccounts();
```

###### list
Para recuperar a listagem de todas as contas de Ads que você possui utilize o comando ``` list```

```php
<?php
#controller

$adAccounts = $adsApi->adAccounts();
$adAccounts->list(['account_id', 'balance', 'name']);
```
