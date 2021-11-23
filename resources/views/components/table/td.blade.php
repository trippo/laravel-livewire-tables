@props(['theme', 'customAttributes' => []])

@if ($theme === 'tailwind')
    <td {{
        $attributes->merge($customAttributes)
            ->class(['px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white' => $customAttributes['default'] ?? true])
            ->except('default')
    }}>{{ $slot }}</td>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
