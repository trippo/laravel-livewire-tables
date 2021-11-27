@aware(['component'])

@php
    $theme = $component->getTheme();

    $customAttributes = [
        'wrapper' => $this->getTableWrapperAttributes(),
        'table' => $this->getTableAttributes(),
        'thead' => $this->getTheadAttributes(),
        'tbody' => $this->getTbodyAttributes(),
    ];
@endphp

@if ($theme === 'tailwind')
    <div {{
        $attributes->merge($customAttributes['wrapper'])
            ->class(['shadow overflow-y-scroll border-b border-gray-200 sm:rounded-lg' => $customAttributes['wrapper']['default'] ?? true])
            ->except('default')
    }}>
        <table {{
            $attributes->merge($customAttributes['table'])
                ->class(['min-w-full divide-y divide-gray-200 dark:divide-none' => $customAttributes['table']['default'] ?? true])
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
    </div>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
