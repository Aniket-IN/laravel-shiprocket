<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Shiprocket Credentilas
    |--------------------------------------------------------------------------
    |
    | Here you can set the shiprocket credentilas.
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

    
    'default_credentials' => env('SHIPROCKET_DEFAULT_CREDENTIALS', 'default'),


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