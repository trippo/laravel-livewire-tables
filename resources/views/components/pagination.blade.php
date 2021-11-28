@aware(['component'])
@props(['rows'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div>
        @if ($component->paginationVisibilityIsEnabled())
            <div class="mt-4 px-6 py-2 md:p-0">
                @if ($component->paginationIsEnabled() && $rows->lastPage() > 1)
                    {{ $rows->links('livewire-tables::specific.tailwind.pagination') }}
                @else
                    <p class="text-sm text-gray-700 leading-5 dark:text-white">
                        @lang('Showing')
                        <span class="font-medium">{{ $rows->count() }}</span>
                        @lang('results')
                    </p>
                @endif
            </div>
        @endif
    </div>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
