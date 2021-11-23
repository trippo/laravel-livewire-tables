<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

trait ComponentUtilities
{
    /**
     * @return string
     */
    public function getTheme(): string
    {
        return config('livewire-tables.theme', 'tailwind');
    }
}
