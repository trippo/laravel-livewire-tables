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
        return $this->setPaginationStatus(true);
    }

    /**
     * @return $this
     */
    public function setPaginationDisabled(): self
    {
        return $this->setPaginationStatus(false);
    }

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
}
