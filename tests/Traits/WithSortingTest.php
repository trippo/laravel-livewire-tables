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
        $sort = $this->basicTable->sortBy('id');

        $this->assertSame($sort, 'asc');

        $this->basicTable->setSortingDisabled();

        $sort = $this->basicTable->sortBy('id');

        $this->assertNull($sort);
    }

    /** @test */
    public function clear_sorts_if_single_sorting_and_setting_not_current_field(): void
    {
        $this->basicTable->setSingleSortingDisabled();

        $this->basicTable->sortBy('id');
        $this->basicTable->sortBy('name');

        $this->assertSame($this->basicTable->getSorts(), ['id' => 'asc', 'name' => 'asc']);

        $this->basicTable->clearSorts();

        $this->basicTable->setSingleSortingEnabled();

        $this->basicTable->sortBy('id');

        $this->assertSame($this->basicTable->getSorts(), ['id' => 'asc']);

        $this->basicTable->sortBy('name');

        $this->assertSame($this->basicTable->getSorts(), ['name' => 'asc']);
    }

    /** @test */
    public function set_sort_asc_if_not_set(): void
    {
        $this->assertFalse($this->basicTable->hasSort('id'));

        $this->basicTable->sortBy('id');

        $this->assertSame($this->basicTable->getSorts(), ['id' => 'asc']);
    }

    /** @test */
    public function set_sort_desc_if_currently_asc(): void
    {
        $this->basicTable->setSort('id', 'asc');

        $this->assertSame($this->basicTable->getSorts(), ['id' => 'asc']);

        $this->basicTable->sortBy('id');

        $this->assertSame($this->basicTable->getSorts(), ['id' => 'desc']);
    }

    /** @test */
    public function remove_sort_if_currently_desc(): void
    {
        $this->basicTable->setSort('id', 'desc');

        $this->assertSame($this->basicTable->getSorts(), ['id' => 'desc']);

        $this->basicTable->sortBy('id');

        $this->assertFalse($this->basicTable->hasSort('id'));
    }

    /** @test */
    public function default_sorting_gets_applied_if_set_and_there_are_no_sorts(): void
    {
        Livewire::test(PetsTable::class)
            // TODO: Move to visuals
            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico'])
            ->call('setDefaultSort', 'name', 'desc')
            ->assertSeeInOrder(['Tux', 'May', 'Chico', 'Cartman', 'Ben']);
    }

    /** @test */
    public function sort_direction_can_only_be_asc_or_desc(): void
    {
        // If not asc, desc, default to asc
        // TODO: Move to visuals
        Livewire::test(PetsTable::class)
            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico'])
            ->call('setSort', 'name', 'ugkugkuh')
            ->assertSeeInOrder(['Ben', 'Cartman', 'Chico', 'May', 'Tux']);

        Livewire::test(PetsTable::class)
            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico'])
            ->call('setSort', 'name', 'desc')
            ->assertSeeInOrder(['Tux', 'May', 'Chico', 'Cartman', 'Ben']);
    }

    /** @test */
    public function skip_sorting_column_if_it_does_not_have_a_field(): void
    {
        // Other col is a label therefore has no field
        // TODO: Move to visuals
        Livewire::test(PetsTable::class)
            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico'])
            ->call('setSort', 'other', 'desc')
            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico']);
    }

    /** @test */
    public function skip_sorting_column_if_it_is_not_sortable(): void
    {
        // Other col is a label therefore is not sortable
        // TODO: Move to visuals
        Livewire::test(PetsTable::class)
            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico'])
            ->call('setSort', 'other', 'desc')
            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico']);
    }

    /** @test */
    public function sort_callback_gets_applied_if_specified(): void
    {
        // TODO
    }

    /** @test */
    public function sort_field_and_direction_are_applied_if_no_sort_callback(): void
    {
        // TODO: Test that there is no callback
        // TODO: Move to visuals

        Livewire::test(PetsTable::class)
            ->assertSeeInOrder(['Cartman', 'Tux', 'May', 'Ben', 'Chico'])
            ->call('setSort', 'name', 'desc')
            ->assertSeeInOrder(['Tux', 'May', 'Chico', 'Cartman', 'Ben']);
    }
}
