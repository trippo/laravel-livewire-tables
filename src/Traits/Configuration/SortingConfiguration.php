<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Configuration;

trait SortingConfiguration
{
    /**
     * @param  bool  $status
     *
     * @return $this
     */
    public function setSortingStatus(bool $status): self
    {
        $this->sortingStatus = $status;

        return $this;
    }

    /**
     * @return $this
     */
    public function setSortingEnabled(): self
    {
        return $this->setSortingStatus(true);
    }

    /**
     * @return $this
     */
    public function setSortingDisabled(): self
    {
        return $this->setSortingStatus(false);
    }

    /**
     * @return bool
     */
    public function getSortingStatus(): bool
    {
        return $this->sortingStatus;
    }
}
