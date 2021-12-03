<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\SearchConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Helpers\SearchHelpers;

trait WithSearch
{
    use SearchConfiguration,
        SearchHelpers;

    public ?string $search = null;
    protected bool $searchStatus = true;
    protected bool $searchVisibilityStatus = true;
    protected ?int $searchFilterDebounce = null;
    protected ?bool $searchFilterDefer = null;
    protected ?bool $searchFilterLazy = null;

    // TODO
    public function applySearch(Builder $builder): Builder
    {
        if ($this->searchIsEnabled() && $this->hasSearch()) {
            $searchableColumns = $this->getSearchableColumns();

            if ($searchableColumns->count()) {
                $builder->where(function ($query) use ($searchableColumns) {
                    foreach ($searchableColumns as $index => $column) {
                        if ($column->hasSearchCallback()) {
                            ($column->getSearchCallback())($query, $this->getSearch());
                        } else {
                            $query->{$index === 0 ? 'where' : 'orWhere'}($column->getColumn(), 'like', '%'.$this->getSearch().'%');
                        }
                    }
                });
            }
        }

        return $builder;
    }
}
