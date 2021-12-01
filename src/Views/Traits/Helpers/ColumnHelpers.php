<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Helpers;

use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Exceptions\DataTableConfigurationException;

trait ColumnHelpers
{

    /**
     * @return bool
     */
    public function hasFrom(): bool
    {
        return $this->from !== null;
    }

    /**
     * @return string|null
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param  string  $field
     *
     * @return bool
     */
    public function isField(string $field): bool
    {
        return $this->getField() === $field;
    }

    /**
     * @param  string  $column
     *
     * @return bool
     */
    public function isColumn(string $column): bool
    {
        return $this->getColumn() === $column;
    }

    /**
     * @param  string  $name
     *
     * @return bool
     */
    public function isColumnBySelectName(string $name): bool
    {
        return $this->getColumnSelectName() === $name;
    }

    /**
     * @return bool
     */
    public function hasField(): bool
    {
        return $this->getField() !== null;
    }

    /**
     * @return bool
     */
    public function isLabel(): bool
    {
        return ! $this->hasFrom() && ! $this->hasField();
    }

    /**
     * @return string|null
     */
    public function getTable(): ?string
    {
        return $this->table;
    }

    /**
     * @return string|null
     */
    public function getColumn(): ?string
    {
        return $this->getTable() . '.' . $this->getField();
    }

    /**
     * @return string|null
     */
    public function getColumnSelectName(): ?string
    {
        if ($this->isBaseColumn()) {
            return $this->getField();
        }

        return $this->getRelationString().'.'.$this->getField();
    }

    /**
     * TODO: Test
     *
     * @param  Model  $row
     *
     * @return array|mixed|string
     * @throws DataTableConfigurationException
     */
    public function getContents(Model $row)
    {
        if ($this->shouldCollapseOnMobile() && $this->shouldCollapseOnTablet()) {
            throw new DataTableConfigurationException('You should only specify a column should collapse on mobile OR tablet, not both.');
        }

        if ($this->isLabel()) {
            // TODO: Get content from callback or something
            return 'N/A';
        }

        if ($this->isBaseColumn()) {
            return $row->{$this->getField()};
        }

        return $row->{$this->getRelationString().'.'.$this->getField()};
    }

    /**
     * @return callable|null
     */
    public function getSortCallback(): ?callable
    {
        return $this->sortCallback;
    }

    /**
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->hasField() && $this->sortable === true;
    }

    /**
     * @return bool
     */
    public function hasSortCallback(): bool
    {
        return $this->sortCallback !== null;
    }

    /**
     * @return $this
     */
    public function collapseOnMobile(): self
    {
        $this->collapseOnMobile = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function shouldCollapseOnMobile(): bool
    {
        return $this->collapseOnMobile;
    }

    /**
     * @return $this
     */
    public function collapseOnTablet(): self
    {
        $this->collapseOnTablet = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function shouldCollapseOnTablet(): bool
    {
        return $this->collapseOnTablet;
    }

    /**
     * @return string
     */
    public function getSortingPillTitle(): string
    {
        if ($this->hasCustomSortingPillTitle()) {
            return $this->getCustomSortingPillTitle();
        }

        return $this->getTitle();
    }

    /**
     * @return string|null
     */
    public function getCustomSortingPillTitle(): ?string
    {
        return $this->sortingPillTitle;
    }

    /**
     * @return bool
     */
    public function hasCustomSortingPillTitle(): bool
    {
        return $this->getCustomSortingPillTitle() !== null;
    }

    /**
     * @return bool
     */
    public function hasCustomSortingPillDirections(): bool
    {
        return $this->sortingPillDirectionAsc !== null && $this->sortingPillDirectionDesc !== null;
    }

    /**
     * @param  string  $direction
     *
     * @return string
     */
    public function getCustomSortingPillDirections(string $direction): string
    {
        if ($direction === 'asc') {
            return $this->sortingPillDirectionAsc;
        }

        if ($direction === 'desc') {
            return $this->sortingPillDirectionDesc;
        }

        return __('N/A');
    }

    /**
     * @param  DataTableComponent  $component
     * @param  string  $direction
     *
     * @return string
     */
    public function getSortingPillDirection(DataTableComponent $component, string $direction): string
    {
        if ($this->hasCustomSortingPillDirections()) {
            return $this->getCustomSortingPillDirections($direction);
        }

        return $direction === 'asc' ? $component->getDefaultSortingLabelAsc() : $component->getDefaultSortingLabelDesc();
    }

    /**
     * @return bool
     */
    public function eagerLoadRelationsIsEnabled(): bool
    {
        return $this->eagerLoadRelations === true;
    }
}
