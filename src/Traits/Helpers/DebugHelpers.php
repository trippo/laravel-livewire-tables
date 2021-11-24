<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Helpers;

trait DebugHelpers
{
    /**
     * @return bool
     */
    public function getDebugStatus(): bool
    {
        return $this->debugStatus;
    }
}
