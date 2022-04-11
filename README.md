
# Laravel-Shiprocket

Shiprocket API Wrapper for Laravel

## Features

- Fully Customizeable
- Easy One Liners
- Token Caching
- Any Data Type for Response 

## Installation

You can install the package via composer:

```bash
  composer require aniket-in/shiprocket-laravel
```

You can publish config file with:
```bash
  php artisan vendor:publish --provider="AniketIN\Shiprocket\ShiprocketServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Shiprocket Credentilas
    |--------------------------------------------------------------------------
    |
    | Here you can set multiple shiprocket credentilas pair.
    | And then use any credential pair by their key i.e. default, second 
    | 
    */

    'credentials' => [
        'default' => [
            'email' => env('SHIPROCKET_EMAIL', 'example@email.com'),
            'password' => env('SHIPROCKET_PASSWORD', 'password'),
        ],
        // 'second' => [
        //     'email' => env('SHIPROCKET_SECOND_EMAIL', 'example@email.com'),
        //     'password' => env('SHIPROCKET_SECOND_PASSWORD', 'password'),
        // ],
    ],

    
     /*
    |--------------------------------------------------------------------------
    | Shiprocket Credentilas
    |--------------------------------------------------------------------------
    |
    | Here you can set the default credentilas to use by their key.
    | i.e. default, second 
    | 
    */

    'default_credentials' => env('SHIPROCKET_DEFAULT_CREDENTIALS', 'default'),


     /*
    |--------------------------------------------------------------------------
    | Shiprocket Credentilas
    |--------------------------------------------------------------------------
    |
    | Here you can set the behaviour whether to use caching or not for auth tokens.
    | 
    */
    'token_cache' => env('SHIPROCKET_TOKEN_CACHE', true),



    /*
    |--------------------------------------------------------------------------
    | Token Cache Expiry Duration
    |--------------------------------------------------------------------------
    |
    | Here you can set token's cache expiry duration
    | 
    */
    'token_cache_duration' => env('SHIPROCKET_TOKEN_CACHE_DURATION', 86400),

];
```

## Import
To use the methods of this package, import the Facade on top of your controller like this:
```php
use AniketIN\Shiprocket\Facades\Shiprocket;
```

## Authentication

Using this package handle the Authentication itself, you don't need to do anything other than, just setting up your Shiprocket credentials in the `config/shiprocket.php` file. 

You can also configure *token caching* to `true` in that config file. 
This will save a lot of time by caching the *token* and not generating new token on every request.
The `cache duration` is also customizeable.

However, if you want to just get the token
```php
Shiprocket::getToken();
```

## Authors

- [@Aniket-IN](https://github.com/Aniket-IN)


## Support & Feedback

For support or feedback, email laravel-shiprocket@aniket.ind.in or raise your issue.

