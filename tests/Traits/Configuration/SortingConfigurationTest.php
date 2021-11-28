<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Configuration;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class SortingConfigurationTest extends TestCase
{
    /** @test */
    public function can_set_sorting_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->getSortingStatus());

        $table->setSortingDisabled();

        $this->assertFalse($table->getSortingStatus());

        $table->setSortingEnabled();

        $this->assertTrue($table->getSortingStatus());

        $table->setSortingStatus(false);

        $this->assertFalse($table->getSortingStatus());

        $table->setSortingStatus(true);

        $this->assertTrue($table->getSortingStatus());
    }

    /** @test */
    public function can_set_single_sorting_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->getSingleSortingStatus());

        $table->setSingleSortingDisabled();

        $this->assertFalse($table->getSingleSortingStatus());

        $table->setSingleSortingEnabled();

        $this->assertTrue($table->getSingleSortingStatus());

        $table->setSingleSortingStatus(false);

        $this->assertFalse($table->getSingleSortingStatus());

        $table->setSingleSortingStatus(true);

        $this->assertTrue($table->getSingleSortingStatus());
    }

    /** @test */
    public function can_set_default_sort(): void
    {
        $table = new PetsTable();

        $this->assertNull($table->getDefaultSortColumn());
        $this->assertSame('asc', $table->getDefaultSortDirection());

        $table->setDefaultSort('id', 'desc');

        $this->assertSame('id', $table->getDefaultSortColumn());
        $this->assertSame('desc', $table->getDefaultSortDirection());
    }

    /** @test */
    public function can_remove_default_sort(): void
    {
        $table = new PetsTable();

        $table->setDefaultSort('id', 'desc');

        $this->assertSame('id', $table->getDefaultSortColumn());
        $this->assertSame('desc', $table->getDefaultSortDirection());

        $table->removeDefaultSort();

        $this->assertNull($table->getDefaultSortColumn());
        $this->assertSame('asc', $table->getDefaultSortDirection());
    }

    /** @test */
    public function can_set_sorting_pill_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->getSortingPillsStatus());

        $table->setSortingPillsDisabled();

        $this->assertFalse($table->getSortingPillsStatus());

        $table->setSortingPillsEnabled();

        $this->assertTrue($table->getSortingPillsStatus());

        $table->setSortingPillsStatus(false);

        $this->assertFalse($table->getSortingPillsStatus());

        $table->setSortingPillsStatus(true);

        $this->assertTrue($table->getSortingPillsStatus());
    }
}
