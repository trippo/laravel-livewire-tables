<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Rappasoft\LaravelLivewireTables\Traits\Configuration\ComponentConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\DebuggingConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\PaginationConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\RefreshConfiguration;

trait WithConfiguration
{
    use ComponentConfiguration,
        DebuggingConfiguration,
        PaginationConfiguration,
        RefreshConfiguration;

    public function configure(): void
    {
    }
}
