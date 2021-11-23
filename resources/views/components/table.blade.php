@props(['theme', 'customAttributes' => []])

@if ($theme === 'tailwind')
    <table {{
        $attributes->merge($customAttributes['table'])
            ->class(['min-w-full divide-y divide-gray-200 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg dark:divide-none' => $customAttributes['table']['default'] ?? true])
            ->except('default')
    }}>
        <thead {{
            $attributes->merge($customAttributes['thead'])
                ->class(['bg-gray-50' => $customAttributes['thead']['default'] ?? true])
                ->except('default')
        }}>
            <tr>
                {{ $thead }}
            </tr>
        </thead>
        <tbody {{
            $attributes->merge($customAttributes['tbody'])
                ->class(['bg-white divide-y divide-gray-200 dark:divide-none' => $customAttributes['tbody']['default'] ?? true])
                ->except('default')
        }}>
            {{ $slot }}
        </tbody>
    </table>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
