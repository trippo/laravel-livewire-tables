<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Helpers;

use Illuminate\Support\Collection;

trait RelationshipHelpers
{

    // TODO: Test
    public function isBaseColumn(): bool
    {
        return ! $this->hasRelations() && $this->hasField();
    }

    public function hasRelations(): bool
    {
        return $this->getRelations()->count();
    }

    public function getRelations(): Collection
    {
        return collect($this->relations);
    }

    public function getRelationString(): ?string
    {
        if ($this->hasRelations()) {
            return $this->getRelations()->implode('.');
        }

        return null;
    }
}
