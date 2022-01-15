<?php

namespace Rappasoft\LaravelLivewireTables\Views;

use Rappasoft\LaravelLivewireTables\DataTableComponent;

class DateFilter extends Filter
{
    public function render(DataTableComponent $component)
    {
        return view('livewire-tables::components.tools.filters.date', [
            'component' => $component,
            'filter' => $this,
        ]);
    }
}