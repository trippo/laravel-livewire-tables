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

        $this->assertCount(4, $table->getColumns()->toArray());
    }

    /** @test */
    public function can_get_column_by_field(): void
    {
        $table = new PetsTable();

        $column = $table->getColumn('id');

        $this->assertSame('id', $column->getField());
    }
}
