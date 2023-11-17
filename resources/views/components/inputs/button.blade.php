@php
    $type ??= 'button';
    $loading ??= false;
@endphp

@if ($type === 'anchor')
<a {{ $attributes->merge(['class' => 'btn cursor-pointer']) }}>
    {{ $slot }}
</a>
@elseif ($type === 'icon')
<button {{ $attributes->merge(['class' => 'btn-icon']) }}>
    {{ $slot }}
</button>
@else
<button {{ $attributes->merge(['class' => 'btn', 'disabled' => $loading]) }}>
    @if ($loading)
    Aguarde...
    @else
    {{ $slot }}
    @endif
</button>
@endif
