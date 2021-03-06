<?php

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