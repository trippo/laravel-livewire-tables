<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class ComponentUtilitiesTest extends TestCase
{
    /** @test */
    public function can_get_current_theme(): void
    {
        $table = new PetsTable();

        $this->assertEquals('tailwind', $table->getTheme());
    }
}
