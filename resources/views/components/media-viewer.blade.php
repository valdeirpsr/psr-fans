<div x-data="initMediaViewer">
    <template x-if="isVisible">
        <div
            class="bg-black bg-opacity-85 fixed inset-0 flex items-center p-4"
            @click="closeModal"
        >
            {{-- <img class="" src="https://storage.googleapis.com/storage.myfanvip.com.br/prod/user/MU15CFOCSQ/posts/media_1692757281_nathalia_0033.jpg"> --}}
            <iframe class="h-full w-full" src="https://iframe.mediadelivery.net/embed/173318/b35829ad-6f80-462c-9b7e-66633938b3b2?autoplay=true&loop=false&muted=false&preload=true" loading="lazy" allow="accelerometer;gyroscope;autoplay;encrypted-media;" allowfullscreen="true"></iframe>
        </div>
    </template>
</div>
