<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Configuration;

use Livewire\Livewire;
use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class DebuggingConfigurationTest extends TestCase
{
    /** @test */
    public function debug_status_can_be_set(): void
    {
        $table = new PetsTable();

        $this->assertFalse($table->getDebugStatus());

        $table->setDebugEnabled();

        $this->assertTrue($table->getDebugStatus());

        $table->setDebugDisabled();

        $this->assertFalse($table->getDebugStatus());

        $table->setDebugStatus(true);

        $this->assertTrue($table->getDebugStatus());

        $table->setDebugStatus(false);

        $this->assertFalse($table->getDebugStatus());
    }
}
