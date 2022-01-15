@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div class="rounded-md">
        <div>
            <input
                type="checkbox"
                id="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-select-all"
                wire:input="selectAllFilterOptions('{{ $filter->getKey() }}')"
                {{ count($component->getAppliedFilterWithValue($filter->getKey()) ?? []) === count($filter->getOptions()) ? 'checked' : ''}}
            >
            <label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-select-all">@lang('All')</label>
        </div>

        @foreach($filter->getOptions() as $key => $value)
            <div wire:key="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-multiselect-{{ $key }}">
                <input
                    type="checkbox"
                    id="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}"
                    value="{{ $key }}"
                    wire:key="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}"
                    wire:model.stop="{{ $component->getTableName() }}.filters.{{ $filter->getKey() }}"
                    {{ count($component->getAppliedFilterWithValue($filter->getKey()) ?? []) === count($filter->getOptions()) ? 'disabled' : ''}}
                    :class="{'disabled:bg-gray-400 disabled:hover:bg-gray-400' : {{ count($component->getAppliedFilterWithValue($filter->getKey()) ?? []) === count($filter->getOptions()) ? 'true' : 'false' }}}"
                >
                <label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}-{{ $loop->index }}">{{ $value }}</label>
            </div>
        @endforeach
    </div>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
