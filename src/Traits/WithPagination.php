<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Livewire\WithPagination as LivewirePagination;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\PaginationConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Helpers\PaginationHelpers;

trait WithPagination
{
    use LivewirePagination,
        PaginationConfiguration,
        PaginationHelpers;

    public int $perPage = 10;
    protected string $paginationTheme = 'tailwind';
    protected bool $paginationStatus = true;
    protected bool $paginationVisibilityStatus = true;
    protected bool $perPageVisibilityStatus = true;
    protected array $perPageAccepted = [10, 25, 50];

    // TODO: Test
    public function mountWithPagination(): void
    {
        if (in_array(session($this->getPerPagePaginationSessionKey(), $this->getPerPage()), $this->getPerPageAccepted(), true)) {
            $this->setPerPage(session($this->getPerPagePaginationSessionKey(), $this->getPerPage()));
        } else {
            $this->setPerPage($this->getPerPageAccepted()[0] ?? 10);
        }
    }

    // TODO: Test
    public function updatedPerPage($value): void
    {
        if (! in_array($value, $this->getPerPageAccepted(), false)) {
            $value = $this->setPerPage($this->getPerPageAccepted()[0] ?? 10);
        }

        if (in_array(session($this->getPerPagePaginationSessionKey(), $this->getPerPage()), $this->getPerPageAccepted(), true)) {
            session()->put($this->getPerPagePaginationSessionKey(), (int) $value);
        } else {
            session()->put($this->getPerPagePaginationSessionKey(), $this->getPerPageAccepted()[0] ?? 10);
        }

        $this->resetPage();
    }

    private function getPerPagePaginationSessionKey(): string
    {
        return $this->tableName.'-perPage';
    }
}
