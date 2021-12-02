@aware(['component'])
@props(['rows'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div>
        @if ($component->paginationVisibilityIsEnabled())
            <div class="mt-4 sm:flex justify-between items-center space-y-4 sm:space-y-0">
                <div>
                    @if ($component->paginationIsEnabled() && $rows->lastPage() > 1)
                        <p class="text-sm text-gray-700 leading-5 dark:text-white">
                            <span>@lang('Showing')</span>
                            <span class="font-medium">{{ $rows->firstItem() }}</span>
                            <span>@lang('to')</span>
                            <span class="font-medium">{{ $rows->lastItem() }}</span>
                            <span>@lang('of')</span>
                            <span class="font-medium">{{ $rows->total() }}</span>
                            <span>@lang('results')</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-700 leading-5 dark:text-white">
                            @lang('Showing')
                            <span class="font-medium">{{ $rows->count() }}</span>
                            @lang('results')
                        </p>
                    @endif
                </div>

                @if ($component->paginationIsEnabled())
                    {{ $rows->links('livewire-tables::specific.tailwind.pagination') }}
                @endif
            </div>
        @endif
    </div>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
