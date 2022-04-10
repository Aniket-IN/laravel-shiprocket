<?php

namespace AniketIN\Shiprocket\Facades;

use AniketIN\Shiprocket\Shiprocket as ShiprocketShiprocket;
use Illuminate\Support\Facades\Facade;

/**
 * @see \AniketIN\Shiprocket\Shiprocket
 */
class Shiprocket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ShiprocketShiprocket::class;
    }
}
