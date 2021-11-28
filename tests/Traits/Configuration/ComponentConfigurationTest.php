<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Configuration;

use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\Models\Pet;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ComponentConfigurationTest extends TestCase
{
    /** @test */
    public function initial_wrapper_attributes_get_set(): void
    {
        $table = new PetsTable();

        $this->assertSame(['id' => 'datatable-'.$table->id], $table->getComponentWrapperAttributes());

        $table->setComponentWrapperAttributes(['this' => 'that']);

        $this->assertSame($table->getComponentWrapperAttributes(), ['this' => 'that']);
    }

    /** @test */
    public function can_set_table_wrapper_attributes(): void
    {
        $table = new PetsTable();

        $this->assertSame($table->getTableWrapperAttributes(), ['default' => true]);

        $table->setTableWrapperAttributes(['this' => 'that']);

        $this->assertSame($table->getTableWrapperAttributes(), ['this' => 'that']);
    }

    /** @test */
    public function can_set_table_attributes(): void
    {
        $table = new PetsTable();

        $this->assertSame($table->getTableAttributes(), ['default' => true]);

        $table->setTableAttributes(['this' => 'that']);

        $this->assertSame($table->getTableAttributes(), ['this' => 'that']);
    }

    /** @test */
    public function can_set_thead_attributes(): void
    {
        $table = new PetsTable();

        $this->assertSame($table->getTheadAttributes(), ['default' => true]);

        $table->setTheadAttributes(['this' => 'that']);

        $this->assertSame($table->getTheadAttributes(), ['this' => 'that']);
    }

    /** @test */
    public function can_set_tbody_attributes(): void
    {
        $table = new PetsTable();

        $this->assertSame($table->getTbodyAttributes(), ['default' => true]);

        $table->setTbodyAttributes(['this' => 'that']);

        $this->assertSame($table->getTbodyAttributes(), ['this' => 'that']);
    }

    /** @test */
    public function can_set_th_attributes(): void
    {
        $table = new PetsTable();

        $table->setThAttributes(function (Column $column) {
            if ($column->isField('id')) {
                return ['default' => false, 'this' => 'that'];
            }

            return ['default' => true, 'here' => 'there'];
        });

        $this->assertSame($table->getThAttributes($table->columns()[0]), ['default' => false, 'this' => 'that']);
        $this->assertSame($table->getThAttributes($table->columns()[1]), ['default' => true, 'here' => 'there']);
    }

    /** @test */
    public function can_set_tr_attributes(): void
    {
        $table = new PetsTable();

        $table->setTrAttributes(function (Model $row, $index) {
            if ($index === 0) {
                return ['default' => false, 'this' => 'that'];
            }

            return ['default' => true, 'here' => 'there'];
        });

        $this->assertSame($table->getTrAttributes(Pet::find(1), 0), ['default' => false, 'this' => 'that']);
        $this->assertSame($table->getTrAttributes(Pet::find(2), 1), ['default' => true, 'here' => 'there']);
    }

    /** @test */
    public function can_set_td_attributes(): void
    {
        $table = new PetsTable();

        $table->setTdAttributes(function (Column $column, Model $row, $index) {
            if ($column->isField('id') && $index === 1) {
                return ['default' => false, 'this' => 'that'];
            }

            return ['default' => true, 'here' => 'there'];
        });

        $this->assertSame($table->getTdAttributes($table->columns()[1], Pet::find(1), 0), ['default' => true, 'here' => 'there']);
        $this->assertSame($table->getTdAttributes($table->columns()[0], Pet::find(2), 1), ['default' => false, 'this' => 'that']);
    }

    /** @test */
    public function can_set_empty_message(): void
    {
        $table = new PetsTable();

        $table->setEmptyMessage('My empty message');

        $this->assertEquals('My empty message', $table->getEmptyMessage());
    }

    /** @test */
    public function can_set_offline_indicator_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->getOfflineIndicatorStatus());

        $table->setOfflineIndicatorStatus(false);

        $this->assertFalse($table->getOfflineIndicatorStatus());

        $table->setOfflineIndicatorStatus(true);

        $this->assertTrue($table->getOfflineIndicatorStatus());

        $table->setOfflineIndicatorDisabled();

        $this->assertFalse($table->getOfflineIndicatorStatus());

        $table->setOfflineIndicatorEnabled();

        $table->setOfflineIndicatorStatus(true);
    }

    /** @test */
    public function can_set_default_sorting_labels(): void
    {
        $table = new PetsTable();

        $this->assertSame('A-Z', $table->getDefaultSortingLabelAsc());
        $this->assertSame('Z-A', $table->getDefaultSortingLabelDesc());

        $table->setDefaultSortingLabels('1-2', '2-1');

        $this->assertSame('1-2', $table->getDefaultSortingLabelAsc());
        $this->assertSame('2-1', $table->getDefaultSortingLabelDesc());
    }
}
