<?php

namespace Rappasoft\LaravelLivewireTables\Views;

use Rappasoft\LaravelLivewireTables\DataTableComponent;

class MultiSelectFilter extends Filter
{
    protected array $options = [];

    public function options(array $options = []): MultiSelectFilter
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
            ->map(fn ($value) => (string)$value)
            ->filter(fn ($value) => strlen($value))
            ->values()
            ->toArray();
    }

    public function getDefaultValue()
    {
        return [];
    }

    public function getFilterPillValue($value): ?string
    {
        $values = [];

        foreach ($value as $item) {
            $found = $this->getCustomFilterPillValue($item) ?? $this->getOptions()[$item] ?? null;

            if ($found) {
                $values[] = $found;
            }
        }

        return implode(', ', $values);
    }

    public function render(DataTableComponent $component)
    {
        return view('livewire-tables::components.tools.filters.multi-select', [
            'component' => $component,
            'filter' => $this,
        ]);
    }
}
