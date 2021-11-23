<?php

namespace Rappasoft\LaravelLivewireTables;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelLivewireTablesServiceProvider extends PackageServiceProvider
{
    public function bootingPackage(): void
    {
    }

    /**
     * @param Package $package
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-livewire-tables')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations();
    }
}
