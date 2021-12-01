<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Rappasoft\LaravelLivewireTables\Traits\Configuration\ComponentConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Helpers\ComponentHelpers;

trait ComponentUtilities
{
    use ComponentConfiguration,
        ComponentHelpers;

    public array $table = [];
    protected $model;
    protected string $tableName = 'table';
    protected ?string $pageName = null;
    protected bool $queryStringStatus = true;
    protected array $componentWrapperAttributes = [];
    protected array $tableWrapperAttributes = [];
    protected array $tableAttributes = [];
    protected array $theadAttributes = [];
    protected array $tbodyAttributes = [];
    protected $thAttributesCallback;
    protected $trAttributesCallback;
    protected $tdAttributesCallback;
    protected string $emptyMessage = 'No items found. Try to broaden your search.';
    protected bool $offlineIndicator = true;
    protected string $defaultSortingLabelAsc = 'A-Z';
    protected string $defaultSortingLabelDesc = 'Z-A';
    protected bool $eagerLoadAllRelations = false;

    // TODO: Test
    public function queryString(): array
    {
        if ($this->queryStringIsEnabled()) {
            return [
                $this->getTableName() => ['except' => null],
            ];
        }

        return [];
    }
}
