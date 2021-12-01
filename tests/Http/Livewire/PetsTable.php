<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Tests\Models\Pet;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PetsTable extends DataTableComponent
{
    public $model = Pet::class;

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Name')
                ->sortable(),
            Column::make('Age'),
            Column::make('Breed', 'breed.name')
                ->sortable(),
            Column::make('Other')
                ->label(),
        ];
    }
}
