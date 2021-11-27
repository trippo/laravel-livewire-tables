<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Helpers;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class ColumnHelpersTest extends TestCase
{
    /** @test */
    public function can_get_column_list(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertCount(4, $table->getColumns()->toArray());
    }

    /** @test */
    public function can_get_column_by_field(): void
    {
        $table = new PetsTable();
        $table->boot();

        $column = $table->getColumn('id');

        $this->assertSame('id', $column->getField());
    }

    /** @test */
    public function can_get_column_count(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertSame(4, $table->getColumnCount());
    }

    /** @test */
    public function can_tell_if_there_are_collapsable_columns(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertFalse($table->hasCollapsedColumns());

        $this->assertFalse($table->getColumn('id')->shouldCollapseOnMobile());

        $table->getColumn('id')->collapseOnMobile();

        $this->assertTrue($table->getColumn('id')->shouldCollapseOnMobile());

        $this->assertTrue($table->hasCollapsedColumns());
    }

    /** @test */
    public function can_tell_if_columns_should_collapse_on_mobile(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertFalse($table->shouldCollapseOnMobile());

        $table->getColumn('id')->collapseOnMobile();

        $this->assertTrue($table->shouldCollapseOnMobile());
    }

    /** @test */
    public function can_get_collapsed_mobile_columns(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertCount(0, $table->getCollapsedMobileColumns());

        $table->getColumn('id')->collapseOnMobile();
        $table->getColumn('name')->collapseOnMobile();

        $this->assertCount(2, $table->getCollapsedMobileColumns());
        $this->assertSame('ID', $table->getCollapsedMobileColumns()[0]->getTitle());
        $this->assertSame('Name', $table->getCollapsedMobileColumns()[1]->getTitle());
    }

    /** @test */
    public function can_get_collapsed_mobile_columns_count(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertSame(0, $table->getCollapsedMobileColumnsCount());

        $table->getColumn('id')->collapseOnMobile();
        $table->getColumn('name')->collapseOnMobile();

        $this->assertSame(2, $table->getCollapsedMobileColumnsCount());
    }

    /** @test */
    public function can_get_visible_mobile_columns(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertCount(4, $table->getVisibleMobileColumns());

        $table->getColumn('id')->collapseOnMobile();
        $table->getColumn('name')->collapseOnMobile();

        $this->assertCount(2, $table->getVisibleMobileColumns());
        $this->assertSame('Age', $table->getVisibleMobileColumns()->values()[0]->getTitle());
        $this->assertSame('Other', $table->getVisibleMobileColumns()->values()[1]->getTitle());
    }

    /** @test */
    public function can_get_visible_mobile_columns_count(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertSame(4, $table->getVisibleMobileColumnsCount());

        $table->getColumn('id')->collapseOnMobile();
        $table->getColumn('name')->collapseOnMobile();

        $this->assertSame(2, $table->getVisibleMobileColumnsCount());
    }

    /** @test */
    public function can_tell_if_columns_should_collapse_on_tablet(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertFalse($table->shouldCollapseOnTablet());

        $table->getColumn('id')->collapseOnTablet();

        $this->assertTrue($table->shouldCollapseOnTablet());
    }

    /** @test */
    public function can_get_collapsed_tablet_columns(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertCount(0, $table->getCollapsedTabletColumns());

        $table->getColumn('id')->collapseOnTablet();
        $table->getColumn('name')->collapseOnTablet();

        $this->assertCount(2, $table->getCollapsedTabletColumns());
        $this->assertSame('ID', $table->getCollapsedTabletColumns()[0]->getTitle());
        $this->assertSame('Name', $table->getCollapsedTabletColumns()[1]->getTitle());
    }

    /** @test */
    public function can_get_collapsed_tablet_columns_count(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertSame(0, $table->getCollapsedTabletColumnsCount());

        $table->getColumn('id')->collapseOnTablet();
        $table->getColumn('name')->collapseOnTablet();

        $this->assertSame(2, $table->getCollapsedTabletColumnsCount());
    }

    /** @test */
    public function can_get_visible_tablet_columns(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertCount(4, $table->getVisibleTabletColumns());

        $table->getColumn('id')->collapseOnTablet();
        $table->getColumn('name')->collapseOnTablet();

        $this->assertCount(2, $table->getVisibleTabletColumns());
        $this->assertSame('Age', $table->getVisibleTabletColumns()->values()[0]->getTitle());
        $this->assertSame('Other', $table->getVisibleTabletColumns()->values()[1]->getTitle());
    }

    /** @test */
    public function can_get_visible_tablet_columns_count(): void
    {
        $table = new PetsTable();
        $table->boot();

        $this->assertSame(4, $table->getVisibleTabletColumnsCount());

        $table->getColumn('id')->collapseOnTablet();
        $table->getColumn('name')->collapseOnTablet();

        $this->assertSame(2, $table->getVisibleTabletColumnsCount());
    }
}
