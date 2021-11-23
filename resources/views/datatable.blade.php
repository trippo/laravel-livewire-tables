<x-livewire-tables::wrapper
    :debug="$this->getDebugStatus()"
    :debuggable="[]"
    :refresh="$this->getRefreshStatus()"
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
            @foreach($columns as $index => $column)
                <x-livewire-tables::table.th
                    wire:key="header-col-{{ $index }}-{{ $this->id }}"
                    :theme="$this->getTheme()"
                    :column="$column"
                    :customAttributes="$this->getThAttributes($column)"
                />
            @endforeach
        </x-slot>

        @forelse ($rows as $rowIndex => $row)
            <x-livewire-tables::table.tr
                wire:key="row-{{ $rowIndex }}-{{ $this->id }}"
                :theme="$this->getTheme()"
                :index="$index"
                :customAttributes="$this->getTrAttributes($row, $index)"
            >
                @foreach($columns as $colIndex => $column)
                    <x-livewire-tables::table.td
                        wire:key="cell-{{ $rowIndex }}-{{ $colIndex }}-{{ $this->id }}"
                        :theme="$this->getTheme()"
                        :customAttributes="$this->getTdAttributes($column, $row, $index)"
                    >
                        {{ $column->getContents($row) }}
                    </x-livewire-tables::table.td>
                @endforeach
            </x-livewire-tables::table.tr>
        @empty
            <x-livewire-tables::table.empty
                wire:key="empty-message-{{ $this->id }}"
                :theme="$this->getTheme()"
                :colspan="count($columns)"
                :message="$this->getEmptyMessage()"
            />
        @endforelse
    </x-livewire-tables::table>
</x-livewire-tables::wrapper>
