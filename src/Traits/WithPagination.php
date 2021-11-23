<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Livewire\WithPagination as LivewirePagination;

trait WithPagination
{
    use LivewirePagination;

    /**
     * The default pagination theme.
     *
     * @var string
     */
    public string $paginationTheme = 'tailwind';

    /**
     * If disabled, the query will execute with get()
     *
     * @var bool
     */
    public bool $paginationEnabled = true;
}
