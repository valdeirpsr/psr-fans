<x-app-layout>
    <div class="container sm:max-w-5xl p-4">
        <p class="font-bold">Realize o pagamento para liberar o conteúdo</p>

        <div class="grid gap-4 lg:grid-cols-2 mt-8">
            <div class="card space-y-6 rounded-lg border-2 h-min">
                <p class="font-bold">Resumo da assinatura</p>

                <div class="space-y-0.5">
                    <p><span>{{ __('Plano') }}:</span> {{ $subscription['plan_name'] }}</p>
                    <p><span>{{ __('Valor Total') }}:</span> {{ $subscription['total_formated'] }}</p>
                    <p><span>{{ __('Expira em') }}:</span> {{ $subscription['expired_at'] }}</p>
                </div>
            </div>

            <div class="card rounded-lg border-2">
                <livewire:dynamic-component :is="$paymentMethods[0]" :$subscription />
            </div>
        </div>
    </div>
</x-app-layout>
