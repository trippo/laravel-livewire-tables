@aware(['component'])

@if ($component->hasCollapsedColumns())
    @php
        $theme = $component->getTheme();
    @endphp

    @if ($theme === 'tailwind')
        <th
            scope="col"
            {{
                $attributes
                    ->merge(['class' => 'table-cell'])
                    ->class([
                        'md:hidden' =>
                            (($component->shouldCollapseOnMobile() && $component->shouldCollapseOnTablet()) ||
                            ($component->shouldCollapseOnTablet() && ! $component->shouldCollapseOnMobile()))
                    ])
                    ->class(['sm:hidden' => $component->shouldCollapseOnMobile() && ! $component->shouldCollapseOnTablet()])
            }}
        ></th>
    @elseif ($theme === 'bootstrap-4')

    @elseif ($theme === 'bootstrap-5')

    @endif
@endif
