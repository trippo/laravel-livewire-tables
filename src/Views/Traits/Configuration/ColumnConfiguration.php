<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Configuration;

use Rappasoft\LaravelLivewireTables\DataTableComponent;

trait ColumnConfiguration
{
    /**
     * @param  DataTableComponent  $component
     *
     * @return $this
     */
    public function setComponent(DataTableComponent $component): self
    {
        $this->component = $component;

        return $this;
    }

    /**
     * @return $this
     */
    public function label(): self
    {
        $this->from = null;
        $this->field = null;

        return $this;
    }

    /**
     * @param  null  $callback
     *
     * @return $this
     */
    public function sortable($callback = null): self
    {
        $this->sortable = true;

        $this->sortCallback = $callback;

        return $this;
    }

    /**
     * @param  null  $callback
     *
     * @return $this
     */
    public function searchable($callback = null): self
    {
        $this->searchable = true;

        $this->searchCallback = $callback;

        return $this;
    }

    /**
     * @param  string  $table
     *
     * @return $this
     */
    public function setTable(string $table): self
    {
        $this->table = $table;

        return $this;
    }

    /**
     * @param  string  $title
     *
     * @return $this
     */
    public function setSortingPillTitle(string $title): self
    {
        $this->sortingPillTitle = $title;

        return $this;
    }

    /**
     * @param  string  $asc
     * @param  string  $desc
     *
     * @return $this
     */
    public function setSortingPillDirections(string $asc, string $desc): self
    {
        $this->sortingPillDirectionAsc = $asc;
        $this->sortingPillDirectionDesc = $desc;

        return $this;
    }

    /**
     * @return $this
     */
    public function eagerLoadRelations(): self
    {
        $this->eagerLoadRelations = true;

        return $this;
    }
}
