<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Helpers;

use Illuminate\Support\Collection;
use Rappasoft\LaravelLivewireTables\Views\Column;

trait ColumnHelpers
{
    /**
     * @return Collection
     */
    public function getColumns(): Collection
    {
        return collect($this->columns());
    }

    /**
     * @param  string  $field
     *
     * @return Column|null
     */
    public function getColumn(string $field): ?Column
    {
        return $this->getColumns()
            ->filter(fn(Column $column) => $column->isField($field))
            ->first();
    }
}
