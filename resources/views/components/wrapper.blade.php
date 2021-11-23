@props(['component'])

@php
    $refresh = $this->getRefreshStatus();
@endphp

 <div
    {{ $attributes->merge($this->getComponentWrapperAttributes()) }}

    @if (is_numeric($refresh))
        wire:poll.{{ $refresh }}ms
    @elseif(is_string($refresh))
        @if ($refresh === '.keep-alive' || $refresh === 'keep-alive')
            wire:poll.keep-alive
        @elseif($refresh === '.visible' || $refresh === 'visible')
            wire:poll.visible
        @else
            wire:poll="{{ $refresh }}"
        @endif
    @endif
>
    @include('livewire-tables::includes.debug')

     <div>
         {{ $slot }}
     </div>
</div>
