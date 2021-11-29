<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

trait WithData
{
    // TODO: Test
    public function rows()
    {
        $query = $this->query();
        $query = $this->applySorting($query);

        return $this->paginationIsEnabled() ?
            $query->paginate(10, ['*'], $this->getComputedPageName()) :
            $query->get();
    }
}
