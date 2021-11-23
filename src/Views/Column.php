<?php

namespace Rappasoft\LaravelLivewireTables\Views;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Column
{
    protected string $title;
    protected ?string $field = null;
    protected bool $sortable = false;
    protected $sortCallback;

    /**
     * @param  string  $title
     * @param  string|null  $field
     */
    public function __construct(string $title, string $field = null)
    {
        $this->title = $title;

        if (! $field && $title) {
            $this->field = Str::snake($title);
        } else {
            $this->field = $field;
        }
    }

    /**
     * @param  string  $title
     * @param  string|null  $field
     *
     * @return Column
     */
    public static function make(string $title, string $field = null): Column
    {
        return new static($title, $field);
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
     * @param  Model  $row
     *
     * @return array|mixed
     */
    public function getContents(Model $row)
    {
        return data_get($row, $this->getField());
    }

    /**
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->sortable === true;
    }

    /**
     * @param  null  $callback
     *
     * @return $this
     */
    public function sortable($callback = null): self
    {
        $this->sortable = true;

        $this->sortCallback = $callback;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasSortCallback(): bool
    {
        return $this->sortCallback !== null;
    }

    /**
     * @return callable|null
     */
    public function getSortCallback(): ?callable
    {
        return $this->sortCallback;
    }
}
