<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits;

use Livewire\Livewire;
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

        $table->setSingleSortingDisabled();

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

    /** @test */
    public function default_sorting_gets_applied_if_set_and_there_are_no_sorts(): void
    {
//        Livewire::test(PetsTable::class)
//            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico'])
//            ->call('setDefaultSort', 'name', 'desc')
//            ->assertSeeInOrder(['Tux', 'May', 'Chico', 'Cartman', 'Ben']);
    }

    /** @test */
    public function sort_direction_can_only_be_asc_or_desc(): void
    {
//        Livewire::test(PetsTable::class)
//            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico'])
//            ->call('setSort', 'name', 'ugkugkuh')
//            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico']);

//        Livewire::test(PetsTable::class)
//            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico'])
//            ->call('setSort', 'name', 'desc')
//            ->assertSeeInOrder(['Tux', 'May', 'Chico', 'Cartman', 'Ben']);
    }

//    /** @test */
//    public function skip_sorting_column_if_it_does_not_have_a_field(): void
//    {
//
//    }
//
//    /** @test */
//    public function skip_sorting_column_if_it_is_not_sortable(): void
//    {
//
//    }
//
//    /** @test */
//    public function sort_callback_gets_applied_if_specified(): void
//    {
//
//    }
//
//    /** @test */
//    public function sort_field_and_direction_are_applied_if_no_sort_callback(): void
//    {
//
//    }
}
