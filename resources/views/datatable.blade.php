<x-livewire-tables::wrapper :component="$this">
    <x-livewire-tables::tools>
        <x-livewire-tables::tools.sorting-pills />
        <x-livewire-tables::tools.filter-pills />
        <x-livewire-tables::tools.toolbar />
    </x-livewire-tables::tools>

    <x-livewire-tables::table>
        <x-slot name="thead">
            <x-livewire-tables::table.th.row-contents />

            @foreach($columns as $index => $column)
                <x-livewire-tables::table.th :column="$column" :index="$index" />
            @endforeach
        </x-slot>

        @forelse ($rows as $rowIndex => $row)
            <x-livewire-tables::table.tr :row="$row" :rowIndex="$rowIndex">
                <x-livewire-tables::table.td.row-contents :rowIndex="$rowIndex" />

                @foreach($columns as $colIndex => $column)
                    <x-livewire-tables::table.td :column="$column" :colIndex="$colIndex">
                        {{ $column->getContents($row) }}
                    </x-livewire-tables::table.td>
                @endforeach
            </x-livewire-tables::table.tr>

            <x-livewire-tables::table.row-contents :row="$row" :rowIndex="$rowIndex" />
        @empty
            <x-livewire-tables::table.empty  />
        @endforelse
    </x-livewire-tables::table>

    <x-livewire-tables::pagination :rows="$rows" />
</x-livewire-tables::wrapper>
