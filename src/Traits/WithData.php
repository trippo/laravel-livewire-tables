<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

trait WithData
{

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function rows()
    {
        if ($this->paginationStatus) {
            $this->query()->paginate();
        }

        return $this->query()->get();
    }
}
