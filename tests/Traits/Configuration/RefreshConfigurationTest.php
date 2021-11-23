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
        Livewire::test(PetsTable::class)
            ->assertSet('refresh', false)
            ->call('setRefreshTime', 5000)
            ->assertSet('refresh', 5000);
    }

    /** @test */
    public function refresh_keep_alive_can_be_set(): void
    {
        Livewire::test(PetsTable::class)
            ->assertSet('refresh', false)
            ->call('setRefreshKeepAlive')
            ->assertSet('refresh', 'keep-alive');
    }

    /** @test */
    public function refresh_visible_can_be_set(): void
    {
        Livewire::test(PetsTable::class)
            ->assertSet('refresh', false)
            ->call('setRefreshVisible')
            ->assertSet('refresh', 'visible');
    }

    /** @test */
    public function refresh_method_can_be_set(): void
    {
        Livewire::test(PetsTable::class)
            ->assertSet('refresh', false)
            ->call('setRefreshMethod', 'myRefreshMethod')
            ->assertSet('refresh', 'myRefreshMethod');
    }
}
