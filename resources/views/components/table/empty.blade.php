@props(['theme', 'colspan', 'message'])

@if ($theme === 'tailwind')
    <x-livewire-tables::table.tr
        :theme="$theme"
    >
        <x-livewire-tables::table.td
            :theme="$theme"
            :colspan="$colspan"
            class="dark:bg-gray-800"
        >
            <div class="flex justify-center items-center space-x-2 dark:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span class="font-medium py-8 text-gray-400 text-lg dark:text-white">{{ $message }}</span>
            </div>
        </x-livewire-tables::table.td>
    </x-livewire-tables::table.tr>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
