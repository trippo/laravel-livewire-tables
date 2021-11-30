<?php

namespace Rappasoft\LaravelLivewireTables\Views;

use Illuminate\Support\Str;
use Rappasoft\LaravelLivewireTables\Views\Traits\Configuration\ColumnConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Traits\Helpers\ColumnHelpers;
use Rappasoft\LaravelLivewireTables\Views\Traits\Helpers\RelationshipHelpers;

class Column
{
    use ColumnConfiguration,
        ColumnHelpers,
        RelationshipHelpers;

    protected string $title;
    protected ?string $field = null;
    protected bool $sortable = false;
    protected $sortCallback;
    protected bool $collapseOnMobile = false;
    protected bool $collapseOnTablet = false;
    protected ?string $sortingPillTitle = null;
    protected ?string $sortingPillDirectionAsc = null;
    protected ?string $sortingPillDirectionDesc = null;

    /**
     * @param  string  $title
     * @param  string|null  $field
     */
    public function __construct(string $title, string $field = null)
    {
        $this->title = trim($title);

        if ($field) {
            $this->field = trim($field);
        } else {
            $this->field = Str::snake($title);
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
