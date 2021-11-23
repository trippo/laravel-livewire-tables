<?php

namespace Rappasoft\LaravelLivewireTables\Views;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Column
{

    protected string $title;

    protected ?string $field = null;

    public function __construct(string $title, string $field = null)
    {
        $this->title = $title;

        if (! $field && $title) {
            $this->field = Str::snake($title);
        } else {
            $this->field = $field;
        }
    }

    public static function make(string $title, string $field = null): Column
    {
        return new static($title, $field);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getContents(Model $row)
    {
        return data_get($row, $this->getField());
    }
}
