<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

trait WithData
{
    // TODO: Test
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function rows()
    {
        $query = $this->query();
        $query = $this->applySorting($query);

        if ($this->paginationIsEnabled()) {
            return $query->paginate();
        }

        return $query->get();
    }
}
