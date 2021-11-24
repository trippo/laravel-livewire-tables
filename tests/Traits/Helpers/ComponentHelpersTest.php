<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Helpers;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class ComponentHelpersTest extends TestCase
{
    /** @test */
    public function can_get_current_theme(): void
    {
        $table = new PetsTable();

        $this->assertEquals('tailwind', $table->getTheme());
    }

    /** @test */
    public function can_get_empty_message(): void
    {
        $table = new PetsTable();

        $this->assertEquals('No items found. Try to broaden your search.', $table->getEmptyMessage());
    }
}
