
# Laravel-Shiprocket

Shiprocket API Wrapper for Laravel

## Features

- Up-to-date with Shiprocket's API
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

Also, if you want to use different credential other than the default one, then: 
```php
Shiprocket::withCredential('another-credential-key')->nowCallYourMethod(...);
```

## Orders


#### Create Custom Order 
https://apidocs.shiprocket.in/#247e58f3-37f3-4dfb-a4bb-b8f6ab6d41ec
```php
Shiprocket::order()->create([
    // refer above url for required parameters...
])
```

#### Create Channel Specific Order
https://apidocs.shiprocket.in/#45126d19-74ed-4cf5-9447-8ac1041bbb3c
```php
Shiprocket::order()->createChannelSpecific([
    // refer above url for required parameters...
])
```

#### Change/Update Pickup Location of Created Orders
https://apidocs.shiprocket.in/#4ba045ab-e25b-4bb1-adbd-37bbd07b354e
```php
Shiprocket::order()->updatePickupAddress([
    // refer above url for required parameters...
])
```

#### Update Customer Delivery Address
https://apidocs.shiprocket.in/#f98ea72a-2efb-4bbc-a4bb-f4dd7e15618a
```php
Shiprocket::order()->updateCustomerAddress([
    // refer above url for required parameters...
])
```

#### Update Order
https://apidocs.shiprocket.in/#f08900fe-ea38-485d-b50c-3ec2fbc5644a
```php
Shiprocket::order()->update([
    // refer above url for required parameters...
])
```

#### Update Order
https://apidocs.shiprocket.in/#f08900fe-ea38-485d-b50c-3ec2fbc5644a
```php
Shiprocket::order()->update([
    // refer above url for required parameters...
])
```

#### Cancel an Order
https://apidocs.shiprocket.in/#5c0e41ca-d868-44c4-8ddb-73a8de239401
```php
Shiprocket::order()->cancelByIds([ // order ids... ])
```

#### Get all Orders
https://apidocs.shiprocket.in/#d4f48023-b0b2-40af-8072-1adf97227d21
```php
Shiprocket::order()->all([ 
    // refer above url for required parameters...
])
```

#### Get Specific Order Details
https://apidocs.shiprocket.in/#aa23cc40-6ee8-4ce0-b0ab-1a7291514299
```php
Shiprocket::order()->detailsById( // the order id )
```







## Couriers

#### Generate AWB for Shipment
https://apidocs.shiprocket.in/#b267ca9a-f7aa-4edc-8477-7dc15e46e08a
```php
Shiprocket::courier()->generateAwbForShipment([
    // refer above url for required parameters...
])
```

#### List of Couriers
https://apidocs.shiprocket.in/#ce08883d-5782-4523-a425-919d10b27536
```php
Shiprocket::courier()->list([
    // refer above url for required parameters...
])
```

#### Check Courier Serviceability
https://apidocs.shiprocket.in/#29ff5116-0917-41ba-8c82-638412604916
```php
Shiprocket::courier()->serviceability([
    // refer above url for required parameters...
])
```

#### Check International Courier Serviceability
https://apidocs.shiprocket.in/#6d1f2fb0-43c1-434f-8c93-50674a0b59ef
```php
Shiprocket::courier()->internationalServiceability([
    // refer above url for required parameters...
])
```
#### Request for Shipment Pickup
https://apidocs.shiprocket.in/#9f42cdfd-a055-4934-a0f4-86764f87c80d
```php
Shiprocket::courier()->requestShipmentPickup([
    // refer above url for required parameters...
])
```







## Authors

- [@Aniket-IN](https://github.com/Aniket-IN)


## Support & Feedback

For support or feedback, email laravel-shiprocket@aniket.ind.in or raise your issue.

