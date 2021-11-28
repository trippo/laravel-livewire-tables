<div>
    @php
        $debuggable = [
            'sorts' => $component->getSorts()
        ];
    @endphp

    @if ($this->getDebugStatus())
        <pre class="mb-4">{{ var_dump($debuggable) }}</pre>
    @endif
</div>
