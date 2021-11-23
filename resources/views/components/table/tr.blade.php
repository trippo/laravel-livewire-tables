@aware(['component'])
@props(['row', 'rowIndex'])

@php
    $attributes = $attributes->merge(['wire:key' => 'row-'.$rowIndex.'-'.$component->id]);
    $theme = $component->getTheme();
    $customAttributes = $this->getTrAttributes($row, $rowIndex);
@endphp

@if ($theme === 'tailwind')
    <tr wire:loading.class.delay="opacity-50 dark:bg-gray-900 dark:opacity-60" {{
        $attributes->merge($customAttributes)
            ->class(['bg-white dark:bg-gray-700 dark:text-white' => ($customAttributes['default'] ?? true) && $rowIndex % 2 === 0])
            ->class(['bg-gray-50 dark:bg-gray-800 dark:text-white' => ($customAttributes['default'] ?? true) && $rowIndex % 2 !== 0])
            ->except('default')
    }}>
        {{ $slot }}
    </tr>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
