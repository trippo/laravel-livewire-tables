<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Helpers;

trait ActionsHelpers
{
    /**
     * @return bool
     */
    public function getActionsStatus(): bool
    {
        return $this->actionsStatus;
    }

    /**
     * @return bool
     */
    public function actionsAreEnabled(): bool
    {
        return $this->getActionsStatus() === true;
    }

    /**
     * @return bool
     */
    public function actionsAreDisabled(): bool
    {
        return $this->getActionsStatus() === false;
    }

    /**
     * @return bool
     */
    public function hasActions(): bool
    {
        return count($this->actions());
    }

    /**
     * @return array
     */
    public function getActions(): array
    {
        return $this->actions();
    }
}
