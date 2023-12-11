@props([
    'page'
])
@if (config('settings.page.' . $page . '.background'))
<picture
    class="h-screen w-screen fixed"
    x-data="{
        images: [
            { height: '915', width: '412', src: '{{ config('settings.page.' . $page . '.background.sm') }}', maxWidth: '480px' },
            { height: '915', width: '412', src: '{{ config('settings.page.' . $page . '.background.md') }}', maxWidth: '800px' },
            { height: '915', width: '412', src: '{{ config('settings.page.' . $page . '.background.lg') }}', maxWidth: '1024px' }
        ]
    }"
    @contextmenu="(e) => e.preventDefault()"
>
    <img
        src="{{ config('settings.page.' . $page . '.background.default') }}"
        alt=""
        class="h-full object-cover select-none"
        fetchpriority="high"
        loading="eager"
        height="1080"
        width="1920"
    />
</picture>
@endif
