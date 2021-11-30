<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Helpers;

use Illuminate\Support\Str;

trait RelationshipHelpers
{

    // TODO: Test
//    public function isBaseColumn(): bool
//    {
//        return ! Str::contains($this->getField(), '.');
//    }

    /**
     * @return bool
     */
    public function hasRelation(): bool
    {
        return Str::contains($this->getField(), '.');
    }

    /**
     * @return string
     */
    public function getRelationshipName(): string
    {
        return Str::beforeLast($this->getField(), '.');
    }

    /**
     * @return string
     */
    public function getRelationshipField(): string
    {
        return Str::afterLast($this->getField(), '.');
    }
}
