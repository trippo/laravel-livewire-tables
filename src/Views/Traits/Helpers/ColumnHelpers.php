<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Helpers;

use Illuminate\Database\Eloquent\Model;

// TODO: Test
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
     * @param  Model  $row
     *
     * @return array|mixed
     */
    public function getContents(Model $row)
    {
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

    // Setters

    /**
     * @param  string  $field
     */
    public function setField(string $field): void
    {
        $this->field = $field;
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
}
