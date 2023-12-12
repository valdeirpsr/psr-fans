@extends('layouts.app') @section('main')

<x-background-page page="login" />

<div
    x-data="initLoginPage"
    class="w-screen h-screen grid place-content-center p-4 bg-cover relative"
>
    <div
        class="card rounded-2xl border-2 p-0 overflow-hidden dark:border-gray-700 bg-opacity-90"
    >
        <div class="p-4">
            <x-section-title
                title="Login"
                description="Entre com sua conta para acessar o conteúdo disponível"
            />

            <hr class="divide-y-2 my-8 border-gray-300 dark:border-gray-700" />

            @if (session('status'))
            <x-alert type="success">
                {{ session("status") }}
            </x-alert>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label
                        for="input-email"
                        class="w-full block text-sm pl-4 mb-1 text-gray-600"
                        >E-mail</x-label
                    >
                    <x-input
                        type="email"
                        id="input-email"
                        name="email"
                        class="form-input border-2 rounded-full h-12 pl-4 w-full placeholder:text-sm"
                        placeholder="Informe seu e-mail"
                        autocomplete="username"
                    />
                </div>

                <div>
                    <x-label
                        for="input-password"
                        class="w-full block text-sm pl-4 mb-1 text-gray-600"
                        >Senha</x-label
                    >
                    <x-input
                        type="password"
                        id="input-password"
                        name="password"
                        class="form-input border-2 rounded-full h-12 pl-4 w-full placeholder:text-sm"
                        placeholder="Informe sua senha"
                        autocomplete="current-password"
                    />
                </div>

                <div>
                    @if (Route::has('password.request'))
                        <x-nav-link href="{{ route('password.request') }}" class="text-sm float-right">
                            {{ __('Forgot your password?') }}
                        </x-nav-link>
                    @endif

                    <div class="clear-both"></div>
                </div>

                <div class="text-center">
                    <x-validation-errors class="mb-4" />
                </div>

                <div>
                    <x-button class="!block w-full">ENTRAR</x-button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-media-viewer />
@endsection
