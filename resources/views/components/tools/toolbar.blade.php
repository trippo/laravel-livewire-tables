@aware(['component'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div class="md:flex md:justify-between mb-4 px-4 md:p-0">
        <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2">
            @if ($component->reorderIsEnabled())
                <button
                    wire:click="{{ $component->currentlyReorderingIsEnabled() ? 'disableReordering' : 'enableReordering' }}"
                    type="button"
                    class="inline-flex justify-center items-center w-full md:w-auto px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600"
                >
                    @if ($component->currentlyReorderingIsEnabled())
                        @lang('Done Reordering')
                    @else
                        @lang('Reorder')
                    @endif
                </button>
            @endif

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

        <div class="md:flex md:items-center space-y-4 md:space-y-0 md:space-x-2">
            @if ($component->showBulkActionsDropdown())
                <div class="w-full md:w-auto mb-4 md:mb-0">
                    <div
                        x-data="{ open: false }"
                        @keydown.window.escape="open = false"
                        x-on:click.away="open = false"
                        class="relative inline-block text-left z-10 w-full md:w-auto"
                    >
                        <div>
                            <span class="rounded-md shadow-sm">
                                <button
                                    x-on:click="open = !open"
                                    type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600"
                                    id="options-menu"
                                    aria-haspopup="true"
                                    x-bind:aria-expanded="open"
                                    aria-expanded="true"
                                >
                                    @lang('Bulk Actions')

                                    <svg class="-mr-1 ml-2 h-5 w-5" x-description="Heroicon name: chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                        </div>

                        <div
                            x-cloak
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 w-full md:w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-50"
                        >
                            <div class="rounded-md bg-white shadow-xs dark:bg-gray-700 dark:text-white">
                                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    @foreach($this->getBulkActions() as $action => $title)
                                        <button
                                            wire:click="{{ $action }}"
                                            wire:key="bulk-action-{{ $action }}-{{ $component->getTableName() }}"
                                            type="button"
                                            class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 flex items-center space-x-2 dark:text-white dark:hover:bg-gray-600"
                                            role="menuitem"
                                        >
                                            <span>{{ $title }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($component->paginationIsEnabled() && $component->perPageVisibilityIsEnabled())
                <div>
                    <select
                        wire:model="perPage"
                        id="perPage"
                        class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    >
                        @foreach ($component->getPerPageAccepted() as $item)
                            <option value="{{ $item }}" wire:key="per-page-{{ $item }}-{{ $component->getTableName() }}">{{ $item === -1 ? __('All') : $item }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </div>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
