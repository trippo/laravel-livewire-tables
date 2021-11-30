<?php

namespace Rappasoft\LaravelLivewireTables\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait WithData
{
    // TODO: Test

    public function rows()
    {
        return $this->executeQuery($this->baseQuery());
    }

    protected function baseQuery(): Builder
    {
        $builder = $this->builder();

        $builder = $this->joinRelations($builder, $this->getColumnRelations());

        $builder = $this->selectFields($builder);

        return $this->applySorting($builder);
    }

    protected function executeQuery(Builder $builder)
    {
        return $this->paginationIsEnabled() ?
            // TODO: Get per page
            $builder->paginate(10, ['*'], $this->getComputedPageName()) :
            $builder->get();
    }

    protected function joinRelations(Builder $builder, array $relations = []): Builder
    {
        // TODO: Join related tables based on column fields
        foreach ($relations as $relation) {
            $relationship = $builder->getRelation($relation);

            if ($relationship instanceof HasOne) {
                $builder->leftJoin($relationship->getRelated()->getTable(), $relationship->getQualifiedForeignKeyName(), '=', $relationship->getQualifiedParentKeyName());
            }
        }

        return $builder;
    }

    protected function selectFields(Builder $builder): Builder
    {
        $fields = [];

        foreach ($this->getSelectableColumns() as $column) {
            if ($column->getField() === 'id') {
                $fields[] = $builder->getModel()->getTable().'.id';
            } elseif ($column->hasRelation()) {
                $fields[] = $builder->getRelation($column->getRelationshipName())->getRelated()->getTable().'.'.$column->getRelationshipField();
            } else {
                $fields[] = $column->getField();
            }
        }

        return $builder->select($fields);
    }

    protected function getQuerySql(): string
    {
        return $this->baseQuery()->toSql();
    }
}
