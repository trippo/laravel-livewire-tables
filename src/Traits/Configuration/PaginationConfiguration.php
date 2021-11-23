<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Configuration;

trait PaginationConfiguration
{
    public function setPaginationTheme(string $theme): self
    {
        $this->paginationTheme = $theme;

        return $this;
    }

    public function setPagination(bool $status): self
    {
        $this->paginationEnabled = $status;

        return $this;
    }

    public function setPaginationEnabled(): self
    {
        return $this->setPagination(true);
    }

    public function setPaginationDisabled(): self
    {
        return $this->setPagination(false);
    }
}
