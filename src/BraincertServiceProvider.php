<?php

namespace Stephenjude\Braincert;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Stephenjude\Braincert\Commands\BraincertCommand;

class BraincertServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('braincert-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_braincert-laravel_table')
            ->hasCommand(BraincertCommand::class);
    }
}
