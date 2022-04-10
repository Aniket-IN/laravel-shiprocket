<?php

namespace AniketIN\Shiprocket;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AniketIN\Shiprocket\Commands\ShiprocketCommand;

class ShiprocketServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-shiprocket')
            ->hasConfigFile();
    }
}
