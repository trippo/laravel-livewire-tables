<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Configuration;

trait PaginationConfiguration
{
    /**
     * @param  string  $theme
     *
     * @return $this
     */
    public function setPaginationTheme(string $theme): self
    {
        $this->paginationTheme = $theme;

        return $this;
    }

    /**
     * @param  bool  $status
     *
     * @return $this
     */
    public function setPaginationStatus(bool $status): self
    {
        $this->paginationStatus = $status;

        return $this;
    }

    /**
     * @return $this
     */
    public function setPaginationEnabled(): self
    {
        $this->setPaginationStatus(true);

        return $this;
    }

    /**
     * @return $this
     */
    public function setPaginationDisabled(): self
    {
        $this->setPaginationStatus(false);

        return $this;
    }
}
