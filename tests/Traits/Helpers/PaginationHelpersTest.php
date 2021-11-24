<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Helpers;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class PaginationHelpersTest extends TestCase
{
    /** @test */
    public function can_get_pagination_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->paginationIsEnabled());

        $table->setPaginationDisabled();

        $this->assertTrue($table->paginationIsDisabled());
    }
}
