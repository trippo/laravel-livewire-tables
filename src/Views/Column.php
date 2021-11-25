<?php

namespace Rappasoft\LaravelLivewireTables\Views;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

// TODO: Test
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
        $this->title = trim($title);

        if (! $field && $title) {
            $this->field = Str::snake($title);
        } else {
            $this->field = trim($field);
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
     * @param  string  $field
     *
     * @return $this
     */
    public function field(string $field): self
    {
        $this->field = trim($field);

        return $this;
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
     */
    public function setField(string $field): void
    {
        $this->field = $field;
    }

    /**
     * @return bool
     */
    public function hasField(): bool
    {
        return $this->getField() !== null;
    }

    /**
     * @return $this
     */
    public function label(): self
    {
        $this->field = null;

        return $this;
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
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->hasField() && $this->sortable === true;
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
