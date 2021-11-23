<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Configuration;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class PaginationConfigurationTest extends TestCase
{
    /** @test */
    public function pagination_theme_can_be_set(): void
    {
        $table = new PetsTable();

        $this->assertSame('tailwind', $table->getPaginationTheme());

        $table->setPaginationTheme('bootstrap');

        $this->assertSame('bootstrap', $table->getPaginationTheme());
    }

    /** @test */
    public function can_set_pagination_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->getPaginationStatus());

        $table->setPaginationDisabled();

        $this->assertFalse($table->getPaginationStatus());

        $table->setPaginationEnabled();

        $this->assertTrue($table->getPaginationStatus());

        $table->setPaginationStatus(false);

        $this->assertFalse($table->getPaginationStatus());

        $table->setPaginationStatus(true);

        $this->assertTrue($table->getPaginationStatus());
    }
}
