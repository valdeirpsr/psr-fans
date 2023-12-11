@extends('layouts.home') @section('content')
<header class="container sm:max-w-5xl">
    <img
        src="https://placehold.co/384x180"
        class="w-full max-h-80 object-cover"
        alt="Background"
        fetchpriority="high"
        loading="eager"
        height="180"
        width="384"
    />

    <div class="card pt-0">
        <div class="flex items-center space-x-4 -mt-6">
            <img
                src="https://placehold.co/96"
                class="rounded-full border-[2px] border-white"
                alt="Perfil"
                height="96"
                width="96"
            />

            <div>
                <p class="font-bold">YOUR NAME</p>
                <p class="text-gray-500 dark:text-gray-400 text-sm">104 Fotos | 54 Vídeos</p>
            </div>
        </div>

        <p class="mt-3 text-gray-700 dark:text-gray-400">
            Casal que ama aventura, inclusive no sexo! Muita experiência no
            menage com meninas e aqui vamos mostrar um pouquinho de conteúdo
            nosso e com elas. Menos hipocrisia e mais sexo, por favor!
        </p>
    </div>

    <div class="card" x-data="{}">
        <p class="text-sm text-gray-500 dark:text-gray-400">Assine</p>

        <div class="mt-3 text-center">
            <x-inputs.button
                type="button"
                @click="$dispatch('open-subscribe-modal')"
            >
                ASSINE O CONTÉUDO POR R$49,99
            </x-inputs.button>
        </div>
    </div>

    {{--
    <div class="card" x-data="{}">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Sua assinatura expira em 31 dez 2023
        </p>

        <div class="mt-3 text-center">
            <x-inputs.button
                type="button"
                @click="$dispatch('open-subscribe-modal')"
            >
                RENOVAR
            </x-inputs.button>
        </div>
    </div>
    --}}
</header>

<main class="mt-3">
    <div class="card">
        <x-card-media :is-private="false" />
    </div>

    <div class="card">
        <x-card-media :is-private="true" />
    </div>

    <div class="card">
        <x-card-media :is-private="true" />
    </div>

    <div class="card">
        <x-card-media :is-private="true" />
    </div>

    <div class="card">
        <x-card-media :is-private="true" />
    </div>

    <div class="card">
        <x-card-media :is-private="true" />
    </div>

    <div class="card">
        <x-card-media :is-private="true" />
    </div>

    <div class="card">
        <x-card-media :is-private="true" />
    </div>
</main>
@endsection
