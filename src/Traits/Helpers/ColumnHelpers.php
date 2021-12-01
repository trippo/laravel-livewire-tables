<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Helpers;

use Illuminate\Support\Collection;
use Rappasoft\LaravelLivewireTables\Views\Column;

trait ColumnHelpers
{
    /**
     * Set the user defined columns
     */
    public function setColumns(): void
    {
        $columns = collect($this->columns())
            ->filter(fn ($column) => $column instanceof Column)
            ->map(function(Column $column) {
                if ($column->hasField()) {
                    if ($column->isBaseColumn()) {
                        $column->setTable($this->builder()->getModel()->getTable());
                    } else {
                        $column->setTable($this->getTableForColumn($column));
                    }
                }

                return $column;
            });

        $this->columns = $columns;
    }

    /**
     * @return Collection
     */
    public function getColumns(): Collection
    {
        return $this->columns;
    }

    /**
     * @param  string  $qualifiedColumn
     *
     * @return Column|null
     */
    public function getColumn(string $qualifiedColumn): ?Column
    {
        return $this->getColumns()
            ->filter(fn (Column $column) => $column->isColumn($qualifiedColumn))
            ->first();
    }

    /**
     * @param  string  $qualifiedColumn
     *
     * @return Column|null
     */
    public function getColumnBySelectName(string $qualifiedColumn): ?Column
    {
        return $this->getColumns()
            ->filter(fn (Column $column) => $column->isColumnBySelectName($qualifiedColumn))
            ->first();
    }

    /**
     * @return array
     */
    public function getColumnRelations(): array
    {
        return $this->getColumns()
            ->filter(fn (Column $column) => $column->hasRelations())
            ->map(fn (Column $column) => $column->getRelations())
            ->values()
            ->toArray();
    }

    /**
     * @return array
     */
    public function getColumnRelationStrings(): array
    {
        return $this->getColumns()
            ->filter(fn (Column $column) => $column->hasRelations())
            ->map(fn (Column $column) => $column->getRelationString())
            ->values()
            ->toArray();
    }

    /**
     * @return Collection
     */
    public function getSelectableColumns(): Collection
    {
        return $this->getColumns()->reject(fn (Column $column) => $column->isLabel());
    }

    /**
     * @return int
     */
    public function getColumnCount(): int
    {
        return $this->getColumns()->count();
    }

    /**
     * @return bool
     */
    public function hasCollapsedColumns(): bool
    {
        return $this->shouldCollapseOnMobile() + $this->shouldCollapseOnTablet() > 0;
    }

    /**
     * @return bool
     */
    public function shouldCollapseOnMobile(): bool
    {
        return $this->getCollapsedMobileColumnsCount();
    }

    /**
     * @return Collection
     */
    public function getCollapsedMobileColumns(): Collection
    {
        return $this->getColumns()->filter(fn (Column $column) => $column->shouldCollapseOnMobile());
    }

    /**
     * @return int
     */
    public function getCollapsedMobileColumnsCount(): int
    {
        return $this->getCollapsedMobileColumns()->count();
    }

    /**
     * @return Collection
     */
    public function getVisibleMobileColumns(): Collection
    {
        return $this->getColumns()->reject(fn (Column $column) => $column->shouldCollapseOnMobile());
    }

    /**
     * @return int
     */
    public function getVisibleMobileColumnsCount(): int
    {
        return $this->getVisibleMobileColumns()->count();
    }

    /**
     * @return bool
     */
    public function shouldCollapseOnTablet(): bool
    {
        return $this->getCollapsedTabletColumnsCount();
    }

    /**
     * @return Collection
     */
    public function getCollapsedTabletColumns(): Collection
    {
        return $this->getColumns()->filter(fn (Column $column) => $column->shouldCollapseOnTablet());
    }

    /**
     * @return int
     */
    public function getCollapsedTabletColumnsCount(): int
    {
        return $this->getCollapsedTabletColumns()->count();
    }

    /**
     * @return Collection
     */
    public function getVisibleTabletColumns(): Collection
    {
        return $this->getColumns()->reject(fn (Column $column) => $column->shouldCollapseOnTablet());
    }

    /**
     * @return int
     */
    public function getVisibleTabletColumnsCount(): int
    {
        return $this->getVisibleTabletColumns()->count();
    }
}
