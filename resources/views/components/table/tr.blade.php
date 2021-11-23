@props(['theme', 'index' => 0, 'customAttributes' => []])

@if ($theme === 'tailwind')
    <tr wire:loading.class.delay="opacity-50 dark:bg-gray-900 dark:opacity-60" {{
        $attributes->merge($customAttributes)
            ->class(['bg-white dark:bg-gray-700 dark:text-white' => ($customAttributes['default'] ?? true) && $index % 2 === 0])
            ->class(['bg-gray-50 dark:bg-gray-800 dark:text-white' => ($customAttributes['default'] ?? true) && $index % 2 !== 0])
            ->except('default')
    }}>
        {{ $slot }}
    </tr>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
