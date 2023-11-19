<div
    x-data="initMediaViewer"
    @contextmenu="(e) => e.preventDefault();"
>
    <template x-if="isVisible">
        <div
            class="bg-black/90 fixed inset-0 flex items-center justify-center p-4"
            role="dialog"
            aria-modal="true"
            aria-label="Mídia aberta"
            @click="closeModal"
        >
            <img class="max-h-[90vh] max-w-[90vw]" src="https://placehold.co/333x500" alt="" />
            {{-- <iframe class="h-full w-full max-h-[90vh] max-w-[90vw]" src="https://iframe.mediadelivery.net/embed/173318/b35829ad-6f80-462c-9b7e-66633938b3b2?autoplay=true&loop=false&muted=false&preload=true" loading="lazy" allow="accelerometer;gyroscope;autoplay;encrypted-media;" allowfullscreen="true"></iframe> --}}
        </div>
    </template>
</div>
