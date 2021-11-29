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

        $table->setPaginationEnabled();

        $this->assertTrue($table->paginationIsEnabled());
    }

    /** @test */
    public function can_get_pagination_visibility_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->paginationVisibilityIsEnabled());

        $table->setPaginationVisibilityDisabled();

        $this->assertTrue($table->paginationVisibilityIsDisabled());

        $table->setPaginationVisibilityEnabled();

        $this->assertTrue($table->paginationVisibilityIsEnabled());
    }

    /** @test */
    public function can_get_computed_page_name(): void
    {
        $table = new PetsTable();

        $this->assertSame('page', $table->getComputedPageName());

        $table->setTableName('users');

        $this->assertSame('usersPage', $table->getComputedPageName());

        $table->setPageName('newPage');

        $this->assertSame('newPage', $table->getComputedPageName());
    }
}
