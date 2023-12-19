<div
    class="space-y-6"
    x-data="{
        init() {
            $wire.dispatch('generate-pix')
        }
    }"
>
    <p class="font-bold">Pague ****** Via Pix</p>

    <p>Pagar com PIX é rápido e seguro! É só seguir estes passos:</p>

    <div>
        {{ $qrCode }}
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
            <span>Leia o <b>QR Code</b> ou <b>copie</b> o código abaixo</span>
        </p>
        <p class="flex">
            <span class="step-rounded invisible"></span>
            <x-input type="text" readonly value="" />
        </p>
        <p class="flex">
            <span class="step-rounded">4</span>
            <span>Revise as informações de pagamento</span>
        </p>
    </div>
</div>
