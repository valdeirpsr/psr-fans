@extends('layouts.app')

@section('main')
<x-background-page page="subscribe" />

<div class="w-screen h-screen grid place-content-center p-10 bg-cover relative" x-data="initLoginPage">
    <div class="p-0 overflow-hidden">
        <div class="grid text-white">
            <div class="p-4 space-y-12">
                <x-authentication-card-logo class="m-auto" />

                <div class="text-center">
                    <p class="text-2xl font-bold">Assine agora</p>
                    <p class="mt-1.5">
                        O melhor conteúdo está esperando por você 🤞
                    </p>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-4">
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
                    <x-button class="!block w-full" @click="$dispatch('open-subscribe-modal')">
                        Assinar
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</div>

<x-media-viewer />
<x-subscribe-modal />
@endsection
