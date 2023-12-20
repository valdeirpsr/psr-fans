<div x-data="{
        hasError: false,

        init() {
            $wire.dispatch('generate-pix')
        },
    }"
>
    @error('warning')
        <x-alert type="danger">{{ $message }}</x-alert>
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+P+/HgAFhAJ/wlseKgAAAABJRU5ErkJggg=="
            x-on:load="hasError = true"
        />
    @enderror

    <template x-if="!hasError">
        <div class="space-y-6">
            <p class="font-bold">Pague {{ $subscription['total_formated'] }} Via Pix</p>

            <p>Pagar com PIX é rápido e seguro! É só seguir estes passos:</p>

            <div class="flex justify-center">
                @if ($qrCode)
                {{ QrCode::size(300)->generate($qrCode) }}
                @endif
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
                    <x-input type="text" readonly value="{{ $qrCode }}" />
                    <x-button x-clipboard="{{ $qrCode }}">Copiar</x-button>
                </p>
                <p class="flex">
                    <span class="step-rounded">4</span>
                    <span>Revise as informações de pagamento</span>
                </p>
            </div>
        </div>
    </template>
</div>
