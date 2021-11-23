<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Configuration;

use Livewire\Livewire;
use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class PaginationConfigurationTest extends TestCase
{
    /** @test */
    public function pagination_theme_can_be_set(): void
    {
        Livewire::test(PetsTable::class)
            ->assertSet('paginationTheme', 'tailwind')
            ->call('setPaginationTheme', 'bootstrap-4')
            ->assertSet('paginationTheme', 'bootstrap-4');
    }

    /** @test */
    public function pagination_can_be_disabled(): void
    {
        Livewire::test(PetsTable::class)
            ->assertSet('paginationEnabled', true)
            ->call('setPaginationDisabled')
            ->assertSet('paginationEnabled', false);

        Livewire::test(PetsTable::class)
            ->assertSet('paginationEnabled', true)
            ->call('setPagination', false)
            ->assertSet('paginationEnabled', false);
    }

    /** @test */
    public function pagination_can_be_enabled(): void
    {
        Livewire::test(PetsTable::class)
            ->set('paginationEnabled', false)
            ->call('setPaginationEnabled')
            ->assertSet('paginationEnabled', true);

        Livewire::test(PetsTable::class)
            ->set('paginationEnabled', false)
            ->call('setPagination', true)
            ->assertSet('paginationEnabled', true);
    }
}
