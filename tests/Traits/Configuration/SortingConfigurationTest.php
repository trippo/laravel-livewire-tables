<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Configuration;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class SortingConfigurationTest extends TestCase
{
    /** @test */
    public function can_set_sorting_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->getSortingStatus());

        $table->setSortingDisabled();

        $this->assertFalse($table->getSortingStatus());

        $table->setSortingEnabled();

        $this->assertTrue($table->getSortingStatus());

        $table->setSortingStatus(false);

        $this->assertFalse($table->getSortingStatus());

        $table->setSortingStatus(true);

        $this->assertTrue($table->getSortingStatus());
    }
}
