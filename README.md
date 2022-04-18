
# Laravel-Shiprocket

Shiprocket API Wrapper for Laravel


## Table of Contents
1. [Features](#features)
2. [Installation](#installation)
3. [Import](#installation)
4. [Authentication](#authentication)
5. [Response](#response)
6. [Usage](#response)
    1. [Orders](#orders)
    2. [Couriers](#couriers)
    3. [Return Orders](#return-orders)
    4. [Shipments](#shipments)
    5. [Tracking](#tracking)
    6. [Pickup Addresses](#pickup-addresses)
    7. [Wallet](#wallet)
    8. [Products](#products)



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
  php artisan vendor:publish --provider="AniketIN\Shiprocket\ShiprocketServiceProvider" --tag="shiprocket-config"
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


## Response

To get the returned response from the API, you may use any of the Laravel provided method, 
like:
```php
Shiprocket::order()->all()->json();
```
All available methods:
```php
$response->body() : string;
$response->json($key = null) : array|mixed;
$response->object() : object;
$response->collect($key = null) : Illuminate\Support\Collection;
$response->status() : int;
$response->ok() : bool;
$response->successful() : bool;
$response->redirect(): bool;
$response->failed() : bool;
$response->serverError() : bool;
$response->clientError() : bool;
$response->header($header) : string;
$response->headers() : array;
```

For more information refer https://laravel.com/docs/9.x/http-client#making-requests

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

#### Cancel an Order
https://apidocs.shiprocket.in/#5c0e41ca-d868-44c4-8ddb-73a8de239401
```php
Shiprocket::order()->cancelByIds([ 
    // order ids... 
])
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
Shiprocket::order()->detailsById( 
    // the order id 
)
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




## Return Orders

#### Create a Return Order
https://apidocs.shiprocket.in/#81b2135b-d43c-4002-8f7f-a670aa5210fa
```php
Shiprocket::return()->create([
    // refer above url for required parameters...
])
```

#### Get All Return Orders
https://apidocs.shiprocket.in/#a98c37b1-47ac-40b4-b80f-051611fe350e
```php
Shiprocket::return()->all([
    // refer above url for required parameters...
])
```






## Shipments

#### Get All Shipment Details
https://apidocs.shiprocket.in/#a9913eaf-94ba-4012-a105-9687fddc7221
```php
Shiprocket::shipment()->all([
    // refer above url for required parameters...
])
```

#### Get Details of Specific Shipment
https://apidocs.shiprocket.in/#5f9bced5-4f16-4868-be55-a8c0215d0711
```php
Shiprocket::shipment()->detailsById($shipment_id)
```

#### Cancel Shipments By AWBs
https://apidocs.shiprocket.in/#659bb564-413a-4e4c-b866-ebe01d3f61dc
```php
Shiprocket::shipment()->cancelByAWBs([123456, 7890123])
```





## Tracking

#### Get Tracking through AWB
https://apidocs.shiprocket.in/#f2ac0962-4c34-4fe4-8266-50f8a1e8eab0
```php
Shiprocket::track()->awb($awb)
```

#### Get Tracking Data for Multiple AWBS
https://apidocs.shiprocket.in/#cf273e6a-08d0-4624-bf7a-7510c28292e0
```php
Shiprocket::track()->multipleAwb($awb_array)
```

#### Get Tracking through Shipment ID
https://apidocs.shiprocket.in/#89005f4f-2b2f-473d-95b0-f54665a16b42
```php
Shiprocket::track()->shipment($shipment_id)
```

#### Get Tracking Data through Order iD
https://apidocs.shiprocket.in/#bfcf3357-4e39-4134-831a-1ff33f67205e
```php
Shiprocket::track()->order($order_id)
```






## Pickup Addresses

#### Get All Pickup Locations
https://apidocs.shiprocket.in/#3bd67de6-8f00-435f-a708-c0c3ab252fee
```php
Shiprocket::pickupAddress()->all()
```

#### Add a New Pickup Location
https://apidocs.shiprocket.in/#6fbe81f5-c3d5-462e-b18f-d6316dde7779
```php
Shiprocket::pickupAddress()->create([
    // refer above url for required parameters...
])
```




## Wallet

#### Get Wallet Balance
https://apidocs.shiprocket.in/#341bd458-5d80-4978-8e30-13651be2a652
```php
Shiprocket::wallet()->getBalance()
```



## Products

#### Get All Products
https://apidocs.shiprocket.in/#0b8d1f26-3abd-4f4e-9cd8-3928bcfcf30b
```php
Shiprocket::product()->all([
    // refer above url for required parameters...
])
```

#### Get Specific Product Details
https://apidocs.shiprocket.in/#134f7710-660c-464f-b579-6da46ba9402f
```php
Shiprocket::product()->detailsById($product_id)
```

#### Add New Products
https://apidocs.shiprocket.in/#344b789d-584e-486a-a7a9-0cf33ce52bf3
```php
Shiprocket::product()->create([
    // refer above url for required parameters...
])
```





## Authors

- [@Aniket-IN](https://github.com/Aniket-IN)


## Support & Feedback

For support or feedback, email laravel-shiprocket@aniket.ind.in or raise your issue.

