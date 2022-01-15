<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\FilterConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Helpers\FilterHelpers;
use Rappasoft\LaravelLivewireTables\Views\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\SelectFilter;
use DateTime;

trait WithFilters
{
    use FilterConfiguration,
        FilterHelpers;

    public bool $filtersStatus = true;
    public bool $filtersVisibilityStatus = true;
    public bool $filterPillsStatus = true;
    public string $filterLayout = 'popover';

    public function filters(): array
    {
        return [];
    }

    public function applyFilters(Builder $builder): Builder
    {
        if ($this->filtersAreEnabled() && $this->hasFilters() && $this->hasAppliedFiltersWithValues()) {
            foreach ($this->getFilters() as $filter) {
                foreach ($this->getAppliedFiltersWithValues() as $key => $value) {
                    if ($filter->getKey() === $key && $filter->hasFilterCallback()) {
                        if ($filter instanceof SelectFilter || $filter instanceof MultiSelectFilter) {
                            // Make sure value is one of the filter's values
                            if (is_array($value)) {
                                foreach ($value as $index => $val) {
                                    // Instead of nulling the whole thing, remove the bad value
                                    if (! in_array($val, $filter->getKeys())) {
                                        unset($value[$index]);
                                    }
                                }
                            } elseif(! in_array($value, $filter->getKeys())) {
                                continue;
                            }
                        }

                        // Make sure date filters have date values
                        if ($filter instanceof DateFilter && DateTime::createFromFormat('Y-m-d', $value) === false) {
                            continue;
                        }

                        ($filter->getFilterCallback())($builder, $value);
                    }
                }
            }
        }

        return $builder;
    }
}
