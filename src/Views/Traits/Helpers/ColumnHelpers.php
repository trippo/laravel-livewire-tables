<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Helpers;

use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\Exceptions\DataTableConfigurationException;

trait ColumnHelpers
{
    // Getters

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

        return data_get($row, $this->getField());
    }

    /**
     * @return callable|null
     */
    public function getSortCallback(): ?callable
    {
        return $this->sortCallback;
    }

    // Checks

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
        return $this->getField() === null;
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
}
