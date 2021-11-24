<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Helpers;

trait RefreshHelpers
{
    /**
     * @return bool|string
     */
    public function getRefreshStatus()
    {
        return $this->refresh;
    }
}
