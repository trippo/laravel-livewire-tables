<div>
    @if ($component->debugIsEnabled())
        @php
            $debuggable = [
                'query' => $component->getQuerySql(),
                'sorts' => $component->getSorts(),
            ];
        @endphp

        <div class="mb-4">@dump($debuggable)</div>
    @endif
</div>
