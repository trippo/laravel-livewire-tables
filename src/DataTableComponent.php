<?php

namespace Rappasoft\LaravelLivewireTables;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\Traits\ComponentUtilities;
use Rappasoft\LaravelLivewireTables\Traits\WithConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\WithData;
use Rappasoft\LaravelLivewireTables\Traits\WithDebugging;
use Rappasoft\LaravelLivewireTables\Traits\WithPagination;
use Rappasoft\LaravelLivewireTables\Traits\WithRefresh;

abstract class DataTableComponent extends Component
{
    use ComponentUtilities,
        WithConfiguration,
        WithData,
        WithDebugging,
        WithPagination,
        WithRefresh;

    /**
     * @var string[]
     */
    protected $listeners = ['refreshDatatable' => '$refresh'];

    /**
     * @param  null  $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);

        $theme = $this->getTheme();

        if ($theme === 'bootstrap-4' || $theme === 'bootstrap-5') {
            $this->setPaginationTheme('bootstrap');
        }

        // Call the child configuration, if any
        $this->configure();
    }

    /**
     * The array defining the columns of the table.
     *
     * @return array
     */
    abstract public function columns(): array;

    /**
     * The base query with search and filters for the table.
     */
    abstract public function query(): Builder;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire-tables::tailwind.datatable')
            ->with([
                'columns' => $this->columns(),
                'rows' => $this->getRows(),
            ]);
    }
}
