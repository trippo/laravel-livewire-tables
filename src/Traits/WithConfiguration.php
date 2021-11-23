<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Rappasoft\LaravelLivewireTables\Traits\Configuration\ComponentConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\DebuggingConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\PaginationConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\RefreshConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\SortingConfiguration;

trait WithConfiguration
{
    use ComponentConfiguration,
        DebuggingConfiguration,
        PaginationConfiguration,
        RefreshConfiguration,
        SortingConfiguration;

    public function configure(): void
    {
    }
}
