@aware(['component'])

@php
    $theme = $component->getTheme();
@endphp

@if ($theme === 'tailwind')
    <td {{ $attributes->class('px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white')}}>{{ $slot }}</td>
@elseif ($theme === 'bootstrap-4')

@elseif ($theme === 'bootstrap-5')

@endif
