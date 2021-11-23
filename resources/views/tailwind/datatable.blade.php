<x-livewire-tables::wrapper
    :debug="$debug"
    :debuggable="[]"
    :refresh="$refresh"
    :customAttributes="$this->getComponentWrapperAttributes()"
>
    <x-livewire-tables::table
        :theme="$this->getTheme()"
        :customAttributes="[
            'table' => $this->getTableAttributes(),
            'thead' => $this->getTheadAttributes(),
            'tbody' => $this->getTbodyAttributes(),
        ]"
    >
        <x-slot name="thead">
            @foreach($columns as $column)
                <x-livewire-tables::table.th
                    :theme="$this->getTheme()"
                    :column="$column"
                    :customAttributes="$this->getThAttributes($column)"
                />
            @endforeach
        </x-slot>

        @forelse ($rows as $index => $row)
            <x-livewire-tables::table.tr
                wire:key="row-{{ $index }}-{{ $this->id }}"
                :theme="$this->getTheme()"
                :index="$index"
                :customAttributes="$this->getTrAttributes($row, $index)"
            >
                @foreach($columns as $column)
                    <x-livewire-tables::table.td
                        :theme="$this->getTheme()"
                        :customAttributes="$this->getTdAttributes($column, $row, $index)"
                    >
                        {{ $column->getContents($row) }}
                    </x-livewire-tables::table.td>
                @endforeach
            </x-livewire-tables::table.tr>
        @empty
            <x-livewire-tables::table.empty
                :theme="$this->getTheme()"
                :colspan="count($columns)"
                :message="$this->getEmptyMessage()"
            />
        @endforelse
    </x-livewire-tables::table>
</x-livewire-tables::wrapper>
