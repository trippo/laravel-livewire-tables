<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Tests\Models\Pet;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PetsTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Name'),
            Column::make('Age'),
        ];
    }

    public function query(): Builder
    {
        return Pet::query();
    }
}
