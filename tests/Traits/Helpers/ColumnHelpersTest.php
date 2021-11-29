<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Helpers;

use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class ColumnHelpersTest extends TestCase
{
    /** @test */
    public function can_get_column_list(): void
    {
        $this->assertCount(4, $this->basicTable->getColumns()->toArray());
    }

    /** @test */
    public function can_get_column_by_field(): void
    {
        $column = $this->basicTable->getColumn('id');

        $this->assertSame('id', $column->getField());
    }

    /** @test */
    public function can_get_column_count(): void
    {
        $this->assertSame(4, $this->basicTable->getColumnCount());
    }

    /** @test */
    public function can_tell_if_there_are_collapsable_columns(): void
    {
        $this->assertFalse($this->basicTable->hasCollapsedColumns());

        $this->assertFalse($this->basicTable->getColumn('id')->shouldCollapseOnMobile());

        $this->basicTable->getColumn('id')->collapseOnMobile();

        $this->assertTrue($this->basicTable->getColumn('id')->shouldCollapseOnMobile());

        $this->assertTrue($this->basicTable->hasCollapsedColumns());
    }

    /** @test */
    public function can_tell_if_columns_should_collapse_on_mobile(): void
    {
        $this->assertFalse($this->basicTable->shouldCollapseOnMobile());

        $this->basicTable->getColumn('id')->collapseOnMobile();

        $this->assertTrue($this->basicTable->shouldCollapseOnMobile());
    }

    /** @test */
    public function can_get_collapsed_mobile_columns(): void
    {
        $this->assertCount(0, $this->basicTable->getCollapsedMobileColumns());

        $this->basicTable->getColumn('id')->collapseOnMobile();
        $this->basicTable->getColumn('name')->collapseOnMobile();

        $this->assertCount(2, $this->basicTable->getCollapsedMobileColumns());
        $this->assertSame('ID', $this->basicTable->getCollapsedMobileColumns()[0]->getTitle());
        $this->assertSame('Name', $this->basicTable->getCollapsedMobileColumns()[1]->getTitle());
    }

    /** @test */
    public function can_get_collapsed_mobile_columns_count(): void
    {
        $this->assertSame(0, $this->basicTable->getCollapsedMobileColumnsCount());

        $this->basicTable->getColumn('id')->collapseOnMobile();
        $this->basicTable->getColumn('name')->collapseOnMobile();

        $this->assertSame(2, $this->basicTable->getCollapsedMobileColumnsCount());
    }

    /** @test */
    public function can_get_visible_mobile_columns(): void
    {
        $this->assertCount(4, $this->basicTable->getVisibleMobileColumns());

        $this->basicTable->getColumn('id')->collapseOnMobile();
        $this->basicTable->getColumn('name')->collapseOnMobile();

        $this->assertCount(2, $this->basicTable->getVisibleMobileColumns());
        $this->assertSame('Age', $this->basicTable->getVisibleMobileColumns()->values()[0]->getTitle());
        $this->assertSame('Other', $this->basicTable->getVisibleMobileColumns()->values()[1]->getTitle());
    }

    /** @test */
    public function can_get_visible_mobile_columns_count(): void
    {
        $this->assertSame(4, $this->basicTable->getVisibleMobileColumnsCount());

        $this->basicTable->getColumn('id')->collapseOnMobile();
        $this->basicTable->getColumn('name')->collapseOnMobile();

        $this->assertSame(2, $this->basicTable->getVisibleMobileColumnsCount());
    }

    /** @test */
    public function can_tell_if_columns_should_collapse_on_tablet(): void
    {
        $this->assertFalse($this->basicTable->shouldCollapseOnTablet());

        $this->basicTable->getColumn('id')->collapseOnTablet();

        $this->assertTrue($this->basicTable->shouldCollapseOnTablet());
    }

    /** @test */
    public function can_get_collapsed_tablet_columns(): void
    {
        $this->assertCount(0, $this->basicTable->getCollapsedTabletColumns());

        $this->basicTable->getColumn('id')->collapseOnTablet();
        $this->basicTable->getColumn('name')->collapseOnTablet();

        $this->assertCount(2, $this->basicTable->getCollapsedTabletColumns());
        $this->assertSame('ID', $this->basicTable->getCollapsedTabletColumns()[0]->getTitle());
        $this->assertSame('Name', $this->basicTable->getCollapsedTabletColumns()[1]->getTitle());
    }

    /** @test */
    public function can_get_collapsed_tablet_columns_count(): void
    {
        $this->assertSame(0, $this->basicTable->getCollapsedTabletColumnsCount());

        $this->basicTable->getColumn('id')->collapseOnTablet();
        $this->basicTable->getColumn('name')->collapseOnTablet();

        $this->assertSame(2, $this->basicTable->getCollapsedTabletColumnsCount());
    }

    /** @test */
    public function can_get_visible_tablet_columns(): void
    {
        $this->assertCount(4, $this->basicTable->getVisibleTabletColumns());

        $this->basicTable->getColumn('id')->collapseOnTablet();
        $this->basicTable->getColumn('name')->collapseOnTablet();

        $this->assertCount(2, $this->basicTable->getVisibleTabletColumns());
        $this->assertSame('Age', $this->basicTable->getVisibleTabletColumns()->values()[0]->getTitle());
        $this->assertSame('Other', $this->basicTable->getVisibleTabletColumns()->values()[1]->getTitle());
    }

    /** @test */
    public function can_get_visible_tablet_columns_count(): void
    {
        $this->assertSame(4, $this->basicTable->getVisibleTabletColumnsCount());

        $this->basicTable->getColumn('id')->collapseOnTablet();
        $this->basicTable->getColumn('name')->collapseOnTablet();

        $this->assertSame(2, $this->basicTable->getVisibleTabletColumnsCount());
    }
}
