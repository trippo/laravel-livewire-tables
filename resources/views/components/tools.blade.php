@aware(['component'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <div class="flex-col">
        {{ $slot }}
    </div>
@elseif ($theme === 'bootstrap-4')
    <div class="d-flex flex-column">
        {{ $slot }}
    </div>
@elseif ($theme === 'bootstrap-5')

@endif
