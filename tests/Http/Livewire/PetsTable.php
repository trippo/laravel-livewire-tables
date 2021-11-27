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
            Column::make('ID')
                ->field('id'),
            Column::make('Name')
                ->sortable(),
            Column::make('Age'),
            Column::make('Other')
                ->label(),
        ];
    }

    public function query(): Builder
    {
        return Pet::query();
    }
}
