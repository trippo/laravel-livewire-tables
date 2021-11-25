<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Helpers;

use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\Views\Column;

trait ComponentHelpers
{
    /**
     * @return string
     */
    public function getTheme(): string
    {
        return config('livewire-tables.theme', 'tailwind');
    }

    /**
     * @return string[]
     */
    public function getComponentWrapperAttributes(): array
    {
        return count($this->componentWrapperAttributes) ? $this->componentWrapperAttributes : ['id' => 'datatable-' . $this->id];
    }

    /**
     * @return bool[]
     */
    public function getTableAttributes(): array
    {
        return count($this->tableAttributes) ? $this->tableAttributes : ['default' => true];
    }

    /**
     * @return bool[]
     */
    public function getTheadAttributes(): array
    {
        return count($this->theadAttributes) ? $this->theadAttributes : ['default' => true];
    }

    /**
     * @return bool[]
     */
    public function getTbodyAttributes(): array
    {
        return count($this->tbodyAttributes) ? $this->tbodyAttributes : ['default' => true];
    }

    /**
     * @param  Column  $column
     *
     * @return bool[]
     */
    public function getThAttributes(Column $column): array
    {
        return $this->thAttributesCallback ? call_user_func($this->thAttributesCallback, $column) : ['default' => true];
    }

    /**
     * @param  Model  $row
     * @param  int  $index
     *
     * @return bool[]
     */
    public function getTrAttributes(Model $row, int $index): array
    {
        return $this->trAttributesCallback ? call_user_func($this->trAttributesCallback, $row, $index) : ['default' => true];
    }

    /**
     * @param  Column  $column
     * @param  Model  $row
     * @param  int  $index
     *
     * @return bool[]
     */
    public function getTdAttributes(Column $column, Model $row, int $index): array
    {
        return $this->tdAttributesCallback ? call_user_func($this->tdAttributesCallback, $column, $row, $index) : ['default' => true];
    }

    /**
     * Get the translated empty message of the table
     *
     * @return string
     */
    public function getEmptyMessage(): string
    {
        return __($this->emptyMessage);
    }

    /**
     * @return bool
     */
    public function getOfflineIndicatorStatus(): bool
    {
        return $this->offlineIndicator;
    }

    /**
     * @return bool
     */
    public function offlineIndicatorIsEnabled(): bool
    {
        return $this->getOfflineIndicatorStatus() === true;
    }

    /**
     * @return bool
     */
    public function offlineIndicatorIsDisabled(): bool
    {
        return $this->getOfflineIndicatorStatus() === false;
    }
}
