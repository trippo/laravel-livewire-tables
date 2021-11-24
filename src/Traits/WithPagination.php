<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Livewire\WithPagination as LivewirePagination;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\PaginationConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Helpers\PaginationHelpers;

trait WithPagination
{
    use LivewirePagination,
        PaginationConfiguration,
        PaginationHelpers;

    /**
     * The default pagination theme.
     *
     * @var string
     */
    protected string $paginationTheme = 'tailwind';

    /**
     * If disabled, the query will execute with get()
     *
     * @var bool
     */
    protected bool $paginationStatus = true;
}
