@extends('layouts.app')

@section('content')
<div class="container sm:max-w-5xl p-4">
    <p class="font-bold">Selecione a forma de pagamento!</p>

    <div class="grid gap-4 md:grid-cols-2 mt-8">
        <div class="card space-y-6 rounded-lg border-2 h-min">
            <p class="font-bold">Resumo da assinatura</p>

            <div class="space-y-0.5">
                @foreach ($resume as $key => $value)
                <p><span>{{ $key }}:</span> {{ $value }}</p>
                @endforeach
            </div>
        </div>

        <div class="card space-y-6 rounded-lg border-2">
            <p class="font-bold">Pague {{ $total }} Via Pix</p>

            <p>Pagar com PIX é rápido e seguro! É só seguir estes passos:</p>

            <div>
                {{ QrCode::size(344)->generate($pix) }}
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
