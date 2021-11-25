<?php

namespace Rappasoft\LaravelLivewireTables\Views;

use Illuminate\Support\Str;
use Rappasoft\LaravelLivewireTables\Views\Traits\Configuration\ColumnConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Traits\Helpers\ColumnHelpers;

// TODO: Test
class Column
{
    use ColumnConfiguration,
        ColumnHelpers;

    protected string $title;
    protected ?string $field = null;
    protected bool $sortable = false;
    protected $sortCallback;

    // TODO: Test
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
}
