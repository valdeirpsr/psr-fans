@extends('layouts.app')

@section('main')
<div class="container sm:max-w-5xl p-4">
    <p class="font-bold">Realize o pagamento para liberar o conteúdo</p>

    <div class="grid gap-4 md:grid-cols-2 mt-8">
        <div class="card space-y-6 rounded-lg border-2 h-min dark:border-gray-700">
            <p class="font-bold">Resumo da assinatura</p>

            <div class="space-y-0.5">
                <p><span>{{ __('Assinante') }}:</span> {{ $customer['name'] }}</p>
                <p><span>{{ __('Plano') }}:</span> {{ $plan_name }}</p>
                <p><span>{{ __('Valor Total') }}:</span> {{ $total }}</p>
                <p><span>{{ __('Expira em') }}:</span> {{ $expired_at }}</p>
            </div>
        </div>

        <div class="card space-y-6 rounded-lg border-2 dark:border-gray-700">
            <p class="font-bold">Pague {{ $total }} Via Pix</p>

            <p>Pagar com PIX é rápido e seguro! É só seguir estes passos:</p>

            <div>
                {{ QrCode::size(284)->generate($pix) }}
            </div>

            <div class="space-y-2">
                <p class="flex">
                    <span class="step-rounded">1</span>
                    <span>Abra o <b>aplicativo</b> ou <b>Internet Banking</b> para pagar</span>
                </p>
                <p class="flex">
                    <span class="step-rounded">2</span>
                    <span>Na opção <b>Pix</b>, escolha Ler <b>QR Code</b></span>
                </p>
                <p class="flex">
                    <span class="step-rounded">3</span>
                    <span>Leia o <b>QR Code</b></span>
                </p>
                <p class="flex">
                    <span class="step-rounded">4</span>
                    <span>Revise as informações de pagamento</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
