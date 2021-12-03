@aware(['component'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div class="mb-4 flex justify-between items-center">
        <div class="flex items-center">
            @if ($component->searchIsEnabled() && $component->searchVisibilityIsEnabled())
                <div class="flex rounded-md shadow-sm">
                    <input
                        wire:model{{ $component->getSearchOptions() }}="{{ $component->getTableName() }}.search"
                        placeholder="{{ __('Search') }}"
                        type="text"
                        class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600 @if ($component->hasSearch()) rounded-none rounded-l-md focus:ring-0 focus:border-gray-300 @else focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md @endif"
                    />

                    @if ($component->hasSearch())
                        <span wire:click.prevent="clearSearch" class="inline-flex items-center px-3 text-gray-500 bg-gray-50 rounded-r-md border border-l-0 border-gray-300 cursor-pointer sm:text-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center">
            @if ($component->paginationIsEnabled() && $component->perPageVisibilityIsEnabled())
                <div>
                    <select
                        wire:model="perPage"
                        id="perPage"
                        class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    >
                        @foreach ($component->getPerPageAccepted() as $item)
                            <option value="{{ $item }}">{{ $item === -1 ? __('All') : $item }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
