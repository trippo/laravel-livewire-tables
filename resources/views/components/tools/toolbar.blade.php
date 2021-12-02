@aware(['component'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div class="mb-4 flex justify-between items-center">
        <div>

        </div>

        <div>
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
