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

    /**
     * @return bool
     */
    public function getPaginationVisibilityStatus(): bool
    {
        return $this->paginationVisibilityStatus;
    }

    /**
     * @return bool
     */
    public function paginationVisibilityIsEnabled(): bool
    {
        return $this->getPaginationVisibilityStatus() === true;
    }

    /**
     * @return bool
     */
    public function paginationVisibilityIsDisabled(): bool
    {
        return $this->getPaginationVisibilityStatus() === false;
    }
}
