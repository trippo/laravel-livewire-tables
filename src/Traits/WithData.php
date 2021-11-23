<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

trait WithData
{
    public function getRows()
    {
        if ($this->paginationEnabled) {
            $this->query()->paginate();
        }

        return $this->query()->get();
    }
}
