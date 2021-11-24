<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Helpers;

trait PaginationHelpers
{
    /**
     * @return bool
     */
    public function getPaginationStatus(): bool
    {
        return $this->paginationStatus;
    }

    /**
     * @return string
     */
    public function getPaginationTheme(): string
    {
        return $this->paginationTheme;
    }

    /**
     * @return bool
     */
    public function paginationIsEnabled(): bool
    {
        return $this->getPaginationStatus() === true;
    }

    /**
     * @return bool
     */
    public function paginationIsDisabled(): bool
    {
        return $this->getPaginationStatus() === false;
    }
}
