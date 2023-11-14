@php
    $type ??= 'button';
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
<button {{ $attributes->merge(['class' => 'btn']) }}>
    {{ $slot }}
</button>
@endif
