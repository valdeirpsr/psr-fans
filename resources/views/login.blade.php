@extends('layouts.app')

@section('content')
<div class="w-screen h-screen grid place-content-center p-4" x-data="initLoginPage">
    <div class="card rounded-2xl border-2 p-0 overflow-hidden">
        <div class="p-4">
            <p class="text-2xl font-bold">Login</p>
            <p>Entre com sua conta para acessar o conteúdo disponível</p>

            <hr class="divide-y-2 mt-8" />

            {{-- @TODO: Ziggy Route --}}
            {{-- TODO: Ziggy Route --}}
            <form method="POST" action="" class="mt-8 space-y-4">
                <div>
                    <label for="input-email" class="w-full block text-sm pl-4 mb-1 text-gray-600">E-mail</label>
                    <input
                        type="email"
                        id="input-email"
                        name="email"
                        class="form-input border-2 rounded-full h-12 pl-4 w-full placeholder:text-sm"
                        placeholder="Informe seu e-mail"
                        autocomplete="username"
                    />
                </div>

                <div>
                    <label for="input-password" class="w-full block text-sm pl-4 mb-1 text-gray-600">Senha</label>
                    <input
                        type="password"
                        id="input-password"
                        name="password"
                        class="form-input border-2 rounded-full h-12 pl-4 w-full placeholder:text-sm"
                        placeholder="Informe sua senha"
                        autocomplete="current-password"
                    />
                </div>

                <div>
                    <a href="#" class="text-sm float-right">Esqueci minha senha</a>
                    <div class="clear-both"></div>
                </div>

                <div>
                    <x-inputs.button class="rounded-full bg-red-500">ENTRAR</x-inputs.button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-media-viewer />
@endsection
