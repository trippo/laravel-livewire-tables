<x-livewire-tables::wrapper :component="$this">
    <x-livewire-tables::table>
        <x-slot name="thead">
            @foreach($columns as $index => $column)
                <x-livewire-tables::table.th :column="$column" :index="$index" />
            @endforeach
        </x-slot>

        @forelse ($rows as $rowIndex => $row)
            <x-livewire-tables::table.tr :row="$row" :rowIndex="$rowIndex">
                @foreach($columns as $colIndex => $column)
                    <x-livewire-tables::table.td :column="$column" :colIndex="$colIndex">
                        {{ $column->getContents($row) }}
                    </x-livewire-tables::table.td>
                @endforeach
            </x-livewire-tables::table.tr>
        @empty
            <x-livewire-tables::table.empty  />
        @endforelse
    </x-livewire-tables::table>
</x-livewire-tables::wrapper>
