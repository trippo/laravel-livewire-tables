<div>
    @php
        $debuggable = [
            'sorts' => $component->getSorts()
        ];
    @endphp

    @if ($this->getDebugStatus())
        <pre>{{ var_dump($debuggable) }}</pre>
    @endif
</div>
