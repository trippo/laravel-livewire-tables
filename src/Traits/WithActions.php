<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

/**
 * Trait WithButtons.
 */
trait WithActions
{
    public bool $showActions = true;

    public function getActionsProperty(): array
    {
        return $this->actions();
    }

    public function actions(): array
    {
        if (property_exists($this, 'actions')) {
            return $this->actions;
        }

        return [];
    }
}
