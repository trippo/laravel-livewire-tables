<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Views;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ColumnTest extends TestCase
{
    /** @test */
    public function can_get_column_title(): void
    {
        $column = Column::make('Name');

        $this->assertSame('Name', $column->getTitle());
    }

    /** @test */
    public function can_get_column_field(): void
    {
        $column = Column::make('Name', 'name');

        $this->assertSame('name', $column->getField());
    }

    /** @test */
    public function can_check_if_column_has_field(): void
    {
        $column = Column::make('Name', 'name');

        $this->assertTrue($column->hasField());

        $column->label();

        $this->assertFalse($column->hasField());
    }

    /** @test */
    public function can_infer_field_name_from_title(): void
    {
        $column = Column::make('My Title');

        $this->assertSame('my_title', $column->getField());
    }

    /** @test */
    public function can_remove_field_with_label(): void
    {
        $column = Column::make('My Title')->label();

        $this->assertNull($column->getField());
    }

    /** @test */
    public function can_check_if_column_is_label(): void
    {
        $column = Column::make('My Title');

        $this->assertFalse($column->isLabel());

        $column->label();

        $this->assertTrue($column->isLabel());
    }

    /** @test */
    public function can_check_if_column_is_same_by_field(): void
    {
        $column = Column::make('My Title');

        $this->assertTrue($column->isField('my_title'));
        $this->assertFalse($column->isField('name'));
    }

    /** @test */
    public function can_check_if_column_is_sortable(): void
    {
        $column = Column::make('My Title');

        $this->assertFalse($column->isSortable());

        $column->sortable();

        $this->assertTrue($column->isSortable());

        $column->label();

        $this->assertFalse($column->isSortable());
    }

    /** @test */
    public function can_check_if_column_has_a_sort_callback(): void
    {
        $column = Column::make('My Title')->sortable();

        $this->assertFalse($column->hasSortCallback());

        $column = Column::make('My Title')->sortable(function (Builder $builder, string $direction) {
            return $builder->orderBy('name', $direction);
        });

        $this->assertTrue($column->hasSortCallback());
    }

    /** @test */
    public function can_get_column_sort_callback(): void
    {
        $column = Column::make('My Title')->sortable();

        $this->assertNull($column->getSortCallback());

        $column = Column::make('My Title')->sortable(function (Builder $builder, string $direction) {
            return $builder->orderBy('name', $direction);
        });

        $this->assertIsCallable($column->getSortCallback());
    }

    /** @test */
    public function can_check_if_column_should_collapse_on_mobile(): void
    {
        $column = Column::make('My Title');

        $this->assertFalse($column->shouldCollapseOnMobile());

        $column->collapseOnMobile();

        $this->assertTrue($column->shouldCollapseOnMobile());
    }

    /** @test */
    public function can_check_if_column_should_collapse_on_tablet(): void
    {
        $column = Column::make('My Title');

        $this->assertFalse($column->shouldCollapseOnTablet());

        $column->collapseOnTablet();

        $this->assertTrue($column->shouldCollapseOnTablet());
    }

    /** @test */
    public function can_set_custom_sorting_pill_title(): void
    {
        $column = Column::make('My Title');

        $this->assertNull($column->getCustomSortingPillTitle());

        $column->setSortingPillTitle('New Title');

        $this->assertSame('New Title', $column->getCustomSortingPillTitle());
    }

    /** @test */
    public function can_set_custom_sorting_pill_directions(): void
    {
        $column = Column::make('My Title');

        $this->assertFalse($column->hasCustomSortingPillDirections());

        $column->setSortingPillDirections('1-2', '2-1');

        $this->assertTrue($column->hasCustomSortingPillDirections());
        $this->assertSame('1-2', $column->getCustomSortingPillDirections('asc'));
        $this->assertSame('2-1', $column->getCustomSortingPillDirections('desc'));
    }

    /** @test */
    public function can_get_contents_of_column(): void
    {
        // TODO
    }
}
