@extends('layouts.app')

@section('content')
    <div class="container sm:max-w-5xl">
        <div class="flex-col flex fixed h-screen inset-0 items-stretch">
            <div class="{{ $color }} flex-auto flex-shrink-0 h-[70vh] pb-32">
                <x-lottie-player name="{{ $lottie }}"></x-lottie-player>

                <p class="text-center text-2xl font-bold text-white animate-bounce">
                    {!! $status !!}
                </p>
            </div>

            <div class="flex flex-initial h-full items-center justify-center text-center">
                {{-- @TODO: Ziggy router --}}
                <a
                    class="{{ $color }} border-transparent uppercase px-3 py-2 rounded-md text-sm text-white w-10/12 md:w-6/12 lg:w-3/12"
                    title="Ir para a página inicial"
                    href="/"
                >
                    Página Inicial
                </a>
            </div>
        </div>
    </div>

    @push('scripts-footer')
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    @endpush
@endsection
