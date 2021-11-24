<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class WithSortingTest extends TestCase
{
    /** @test */
    public function cannot_call_sortBy_if_sorting_is_disabled(): void
    {
        $table = new PetsTable();

        $sort = $table->sortBy('id');

        $this->assertSame($sort, 'asc');

        $table->setSortingDisabled();

        $sort = $table->sortBy('id');

        $this->assertNull($sort);
    }

    /** @test */
    public function clear_sorts_if_single_sorting_and_setting_not_current_field(): void
    {
        $table = new PetsTable();

        $table->sortBy('id');
        $table->sortBy('name');

        $this->assertSame($table->getSorts(), ['id' => 'asc', 'name' => 'asc']);

        $table->clearSorts();

        $table->setSingleSortingEnabled();

        $table->sortBy('id');

        $this->assertSame($table->getSorts(), ['id' => 'asc']);

        $table->sortBy('name');

        $this->assertSame($table->getSorts(), ['name' => 'asc']);
    }

    /** @test */
    public function set_sort_asc_if_not_set(): void
    {
        $table = new PetsTable();

        $this->assertFalse($table->hasSort('id'));

        $table->sortBy('id');

        $this->assertSame($table->getSorts(), ['id' => 'asc']);
    }

    /** @test */
    public function set_sort_desc_if_currently_asc(): void
    {
        $table = new PetsTable();

        $table->setSort('id', 'asc');

        $this->assertSame($table->getSorts(), ['id' => 'asc']);

        $table->sortBy('id');

        $this->assertSame($table->getSorts(), ['id' => 'desc']);
    }

    /** @test */
    public function remove_sort_if_currently_desc(): void
    {
        $table = new PetsTable();

        $table->setSort('id', 'desc');

        $this->assertSame($table->getSorts(), ['id' => 'desc']);

        $table->sortBy('id');

        $this->assertFalse($table->hasSort('id'));
    }
}
