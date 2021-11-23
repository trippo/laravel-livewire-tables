<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Configuration;

use Livewire\Livewire;
use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class DebuggingConfigurationTest extends TestCase
{

    /** @test */
    public function debug_can_be_enabled(): void
    {
        Livewire::test(PetsTable::class)
            ->assertSet('debug', false)
            ->call('setDebugEnabled')
            ->assertSet('debug', true);

        Livewire::test(PetsTable::class)
            ->assertSet('debug', false)
            ->call('setDebug', true)
            ->assertSet('debug', true);
    }

    /** @test */
    public function debug_can_be_disabled(): void
    {
        Livewire::test(PetsTable::class)
            ->set('debug', true)
            ->call('setDebugDisabled')
            ->assertSet('debug', false);

        Livewire::test(PetsTable::class)
            ->set('debug', true)
            ->call('setDebug', false)
            ->assertSet('debug', false);
    }
}
