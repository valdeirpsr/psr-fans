@extends('layouts.app')

@section('main')
<div
    class="w-screen h-screen grid place-content-center p-10 bg-red-800 bg-opacity-80 bg-cover bg-blend-color-burn"
    x-data="initLoginPage"
    style="background-image: url('{{ Vite::asset('resources/images/Mon-Mar-6-13-27-27--03-20236406146f733ca.webp') }}')"
>
    <div class="p-0 overflow-hidden">
        <div class="grid text-white">
            <div class="p-4 space-y-12">
                <img
                    src="{{ Vite::asset('resources/images/logo.png') }}"
                    alt="Logo"
                    class="m-auto mb-8"
                />

                <div class="text-center">
                    <p class="text-2xl font-bold">Assine agora</p>
                    <p class="mt-1.5">
                        O melhor conteúdo está esperando por você 🤞
                    </p>
                </div>

                <div class="grid grid-cols-[96px_96px_96px] gap-4 mt-4">
                    <img
                        src="https://placehold.co/96"
                        alt="Conteúdo Grátis"
                        height="96"
                        width="96"
                        @click="openMedia"
                    />
                    <img
                        src="https://placehold.co/96"
                        alt="Conteúdo Grátis"
                        height="96"
                        width="96"
                        @click="openMedia"
                    />
                    <img
                        src="https://placehold.co/96"
                        alt="Conteúdo Grátis"
                        height="96"
                        width="96"
                        @click="openMedia"
                    />
                    <img
                        src="https://placehold.co/96"
                        alt="Conteúdo Grátis"
                        height="96"
                        width="96"
                        @click="openMedia"
                    />
                    <img
                        src="https://placehold.co/96"
                        alt="Conteúdo Grátis"
                        height="96"
                        width="96"
                        @click="openMedia"
                    />
                    <img
                        src="https://placehold.co/96"
                        alt="Conteúdo Grátis"
                        height="96"
                        width="96"
                        @click="openMedia"
                    />
                </div>

                <div>
                    <x-inputs.button
                        class="rounded-full bg-black"
                        @click="$dispatch('open-subscribe-modal')"
                        >Assinar</x-inputs.button
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<x-media-viewer />
<x-subscribe-modal />
@endsection
