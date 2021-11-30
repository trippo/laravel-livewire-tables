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


    // TODO: Test
    public function debugIsEnabled(): bool
    {
        return $this->getDebugStatus() === true;
    }

    public function debugIsDisabled(): bool
    {
        return $this->getDebugStatus() === false;
    }
}
