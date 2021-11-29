<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Helpers;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class SortingHelpersTest extends TestCase
{
    /** @test */
    public function can_get_sorting_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->sortingIsEnabled());

        $table->setSortingDisabled();

        $this->assertTrue($table->sortingIsDisabled());
    }

    /** @test */
    public function can_get_single_sorting_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->singleSortingIsEnabled());

        $table->setSingleSortingDisabled();

        $this->assertTrue($table->singleSortingIsDisabled());
    }

    /** @test */
    public function can_set_sorts_array(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'asc', 'name' => 'desc']);

        $this->assertSame($table->getSorts(), ['id' => 'asc', 'name' => 'desc']);
    }

    /** @test */
    public function can_get_sorts_array(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'asc', 'name' => 'desc']);

        $this->assertSame($table->getSorts(), ['id' => 'asc', 'name' => 'desc']);
    }

    /** @test */
    public function can_get_single_sort_by_field(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'asc']);

        $this->assertSame($table->getSort('id'), 'asc');
        $this->assertNull($table->getSort('name'));
    }

    /** @test */
    public function can_set_single_sort_by_field_and_direction(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertEmpty($table->getSorts());

        $table->setSort('id', 'asc');
        $table->setSort('name', 'desc');

        $this->assertSame($table->getSorts(), ['id' => 'asc', 'name' => 'desc']);
    }

    /** @test */
    public function can_check_if_any_sorts(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'asc', 'name' => 'desc']);

        $this->assertTrue($table->hasSorts());

        $table->clearSorts();

        $this->assertFalse($table->hasSorts());
    }

    /** @test */
    public function can_check_single_sort_by_field(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'asc']);

        $this->assertTrue($table->hasSort('id'));
        $this->assertFalse($table->hasSort('name'));
    }

    /** @test */
    public function can_clear_sorts_array(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'asc', 'name' => 'desc']);

        $this->assertTrue($table->hasSorts());

        $table->clearSorts();

        $this->assertFalse($table->hasSorts());
    }

    /** @test */
    public function can_clear_single_sort_by_field(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'asc', 'name' => 'desc']);

        $this->assertTrue($table->hasSort('id'));

        $table->clearSort('id');

        $this->assertFalse($table->hasSort('id'));
    }

    /** @test */
    public function can_set_sort_field_asc(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'desc']);

        $this->assertSame($table->getSort('id'), 'desc');

        $table->setSortAsc('id');

        $this->assertSame($table->getSort('id'), 'asc');
    }

    /** @test */
    public function can_set_sort_field_desc(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'asc']);

        $this->assertSame($table->getSort('id'), 'asc');

        $table->setSortDesc('id');

        $this->assertSame($table->getSort('id'), 'desc');
    }

    /** @test */
    public function can_check_if_sort_field_currently_asc(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'asc']);

        $this->assertTrue($table->isSortAsc('id'));
        $this->assertFalse($table->isSortDesc('id'));
    }

    /** @test */
    public function can_check_if_sort_field_currently_desc(): void
    {
        $table = new PetsTable();

        $table->setSorts(['id' => 'desc']);

        $this->assertTrue($table->isSortDesc('id'));
        $this->assertFalse($table->isSortAsc('id'));
    }

    /** @test */
    public function can_check_default_sort_status(): void
    {
        $table = new PetsTable();

        $this->assertFalse($table->hasDefaultSort());

        $table->setDefaultSort('id');

        $this->assertTrue($table->hasDefaultSort());
    }

    /** @test */
    public function can_get_sorting_pills_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->sortingPillsAreEnabled());

        $table->setSortingPillsDisabled();

        $this->assertTrue($table->sortingPillsAreDisabled());

        $table->setSortingPillsEnabled();

        $this->assertTrue($table->sortingPillsAreEnabled());
    }
}
