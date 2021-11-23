<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Configuration;

use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\Views\Column;

trait ComponentConfiguration
{
    protected array $componentWrapperAttributes = [];
    protected array $tableAttributes = [];
    protected array $theadAttributes = [];
    protected array $tbodyAttributes = [];
    protected $thAttributesCallback;
    protected $trAttributesCallback;
    protected $tdAttributesCallback;
    protected string $emptyMessage = 'No items found. Try to broaden your search.';

    /**
     * Get a list of attributes to override on the main wrapper of the component
     *
     * @param  array  $attributes
     *
     * @return $this
     */
    public function setComponentWrapperAttributes(array $attributes = []): self
    {
        $this->componentWrapperAttributes = $attributes;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getComponentWrapperAttributes(): array
    {
        return count($this->componentWrapperAttributes) ? $this->componentWrapperAttributes : ['id' => 'datatable-' . $this->id];
    }

    /**
     * Get a list of attributes to override on the table element
     *
     * @param  array  $attributes
     *
     * @return $this
     */
    public function setTableAttributes(array $attributes = []): self
    {
        $this->tableAttributes = $attributes;

        return $this;
    }

    /**
     * @return bool[]
     */
    public function getTableAttributes(): array
    {
        return count($this->tableAttributes) ? $this->tableAttributes : ['default' => true];
    }

    /**
     * Get a list of attributes to override on the thead element
     *
     * @param  array  $attributes
     *
     * @return $this
     */
    public function setTheadAttributes(array $attributes = []): self
    {
        $this->theadAttributes = $attributes;

        return $this;
    }

    /**
     * @return bool[]
     */
    public function getTheadAttributes(): array
    {
        return count($this->theadAttributes) ? $this->theadAttributes : ['default' => true];
    }

    /**
     * Get a list of attributes to override on the tbody element
     *
     * @return $this
     */
    public function setTbodyAttributes(array $attributes = []): self
    {
        $this->tbodyAttributes = $attributes;

        return $this;
    }

    /**
     * @return bool[]
     */
    public function getTbodyAttributes(): array
    {
        return count($this->tbodyAttributes) ? $this->tbodyAttributes : ['default' => true];
    }

    /**
     * Get a list of attributes to override on the th elements
     *
     * @param  callable  $callback
     *
     * @return $this
     */
    public function setThAttributes(callable $callback): self
    {
        $this->thAttributesCallback = $callback;

        return $this;
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
     * Get a list of attributes to override on the td elements
     *
     * @return $this
     */
    public function setTrAttributes(callable $callback): self
    {
        $this->trAttributesCallback = $callback;

        return $this;
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
     * Get a list of attributes to override on the td elements
     *
     * @return $this
     */
    public function setTdAttributes(callable $callback): self
    {
        $this->tdAttributesCallback = $callback;

        return $this;
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
     * @param  string  $message
     *
     * @return $this
     */
    public function setEmptyMessage(string $message): self
    {
        $this->emptyMessage = $message;

        return $this;
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
}
