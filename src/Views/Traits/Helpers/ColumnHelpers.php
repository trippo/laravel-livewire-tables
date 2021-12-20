<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Exceptions\DataTableConfigurationException;
use Rappasoft\LaravelLivewireTables\Views\Column;

trait ColumnHelpers
{
    /**
     * @return DataTableComponent|null
     */
    public function getComponent(): ?DataTableComponent
    {
        return $this->component;
    }

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

    // TODO: Test
    public function renderContents(Model $row)
    {
        if ($this->shouldCollapseOnMobile() && $this->shouldCollapseOnTablet()) {
            throw new DataTableConfigurationException('You should only specify a columns should collapse on mobile OR tablet, not both.');
        }

        return $this->getContents($row);
    }

    // TODO: Test
    public function getContents(Model $row)
    {
        if ($this->isLabel()) {
            $value = call_user_func($this->getLabelCallback(), $row, $this);

            if ($this->isHtml()) {
                return new HtmlString($value);
            }

            return $value;
        }

        $value = $this->getValue($row);

        if ($this->hasFormatter()) {
            $value = call_user_func($this->getFormatCallback(), $value, $row, $this);

            if ($this->isHtml()) {
                return new HtmlString($value);
            }

            return $value;
        }

        return $value;
    }

    // TODO: Test
    public function getValue(Model $row)
    {
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

    // TODO
    public function getSearchCallback(): ?callable
    {
        return $this->searchCallback;
    }

    public function isSearchable(): bool
    {
        return $this->hasField() && $this->searchable === true;
    }

    public function hasSearchCallback(): bool
    {
        return $this->searchCallback !== null;
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

    /**
     * @return bool
     */
    public function isReorderColumn(): bool
    {
        return $this->getField() === $this->component->getDefaultReorderColumn();
    }

    /**
     * @return bool
     */
    public function hasFormatter(): bool
    {
        return $this->formatCallback !== null;
    }

    /**
     * @return callable|null
     */
    public function getFormatCallback(): ?callable
    {
        return $this->formatCallback;
    }

    // TODO
    public function getLabelCallback(): ?callable
    {
        return $this->labelCallback;
    }

    /**
     * @return bool
     */
    public function isHtml(): bool
    {
        return $this->html === true;
    }

    // TODO
    public function view($view): self
    {
        $this->format(function ($value, $row, Column $column) use ($view) {
            return view($view)
                ->withValue($value)
                ->withRow($row)
                ->withColumn($column);
        });

        return $this;
    }
}
