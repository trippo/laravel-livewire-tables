<?php

namespace Rappasoft\LaravelLivewireTables\Views;

use Rappasoft\LaravelLivewireTables\DataTableComponent;

class SelectFilter extends Filter
{
    protected array $options = [];

    public function options(array $options = []): SelectFilter
    {
        $this->options = $options;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getKeys(): array
    {
        return collect($this->getOptions())
            ->keys()
            ->map(fn($value) => (string)$value)
            ->filter(fn($value) => strlen($value))
            ->values()
            ->toArray();
    }

    public function getFilterPillValue($value): ?string
    {
        return $this->getCustomFilterPillValue($value) ?? $this->getOptions()[$value] ?? null;
    }

    public function render(DataTableComponent $component)
    {
        return view('livewire-tables::components.tools.filters.select', [
            'component' => $component,
            'filter' => $this,
        ]);
    }
}