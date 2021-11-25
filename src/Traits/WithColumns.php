<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Illuminate\Support\Collection;
use Rappasoft\LaravelLivewireTables\Views\Column;

trait WithColumns
{
    // TODO: Test
    public function getColumns(): Collection
    {
        return collect($this->columns());
    }

    public function getColumn(string $field): ?Column
    {
        return $this->getColumns()
            ->filter(fn (Column $column) => $column->isField($field))
            ->first();
    }
}
