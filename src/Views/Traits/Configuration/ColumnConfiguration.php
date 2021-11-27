<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Configuration;

trait ColumnConfiguration
{
    /**
     * @param  string  $field
     *
     * @return $this
     */
    public function field(string $field): self
    {
        $this->field = trim($field);

        return $this;
    }

    /**
     * @return $this
     */
    public function label(): self
    {
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
}
