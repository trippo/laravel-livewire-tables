<div>
    @php
        $debuggable = [];
    @endphp

    @if ($this->getDebugStatus())
        {{ var_dump($debuggable) }}
    @endif
</div>
