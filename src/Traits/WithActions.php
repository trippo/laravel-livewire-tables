<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Rappasoft\LaravelLivewireTables\Traits\Configuration\ActionsConfiguration;
use Rappasoft\LaravelLivewireTables\Traits\Helpers\ActionsHelpers;

/**
 * Trait WithButtons.
 */
trait WithActions
{
    use ActionsConfiguration,
        ActionsHelpers;

    public bool $actionsStatus = true;
    public array $actions = [];

    public function actions(): array
    {
        if (property_exists($this, 'actions')) {
            return $this->actions;
        }

        return [];
    }
}
