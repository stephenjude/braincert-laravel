<?php

namespace Stephenjude\Braincert;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BraincertServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         *
         */
        $package
            ->name('braincert-laravel')
            ->hasConfigFile();
    }
}
