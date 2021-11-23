<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Configuration;

use Livewire\Livewire;
use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class RefreshConfigurationTest extends TestCase
{
    /** @test */
    public function refresh_time_can_be_set(): void
    {
        $table = new PetsTable();

        $this->assertFalse($table->getRefreshStatus());

        $table->setRefreshTime(5000);

        $this->assertSame(5000, $table->getRefreshStatus());
    }

    /** @test */
    public function refresh_keep_alive_can_be_set(): void
    {
        $table = new PetsTable();

        $this->assertFalse($table->getRefreshStatus());

        $table->setRefreshKeepAlive();

        $this->assertSame('keep-alive', $table->getRefreshStatus());
    }

    /** @test */
    public function refresh_visible_can_be_set(): void
    {
        $table = new PetsTable();

        $this->assertFalse($table->getRefreshStatus());

        $table->setRefreshVisible();

        $this->assertSame('visible', $table->getRefreshStatus());
    }

    /** @test */
    public function refresh_method_can_be_set(): void
    {
        $table = new PetsTable();

        $this->assertFalse($table->getRefreshStatus());

        $table->setRefreshMethod('myRefreshMethod');

        $this->assertSame('myRefreshMethod', $table->getRefreshStatus());
    }
}
