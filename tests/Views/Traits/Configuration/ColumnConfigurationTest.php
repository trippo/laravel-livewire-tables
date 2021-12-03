<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Views\Traits\Configuration;

use Rappasoft\LaravelLivewireTables\Tests\TestCase;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ColumnConfigurationTest extends TestCase
{
    /** @test */
    public function can_set_column_to_eager_load_relations(): void
    {
        $column = Column::make('Name');

        $this->assertFalse($column->eagerLoadRelationsIsEnabled());

        $column = Column::make('Name')->eagerLoadRelations();

        $this->assertTrue($column->eagerLoadRelationsIsEnabled());
    }

    /** @test */
    public function can_set_component_on_column(): void
    {
        $column = Column::make('Name');

        $this->assertNull($column->getComponent());

        $column->setComponent($this->basicTable);
        
        $this->assertSame($this->basicTable, $column->getComponent());
    }
}
