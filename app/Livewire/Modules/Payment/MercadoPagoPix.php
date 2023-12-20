<?php

namespace App\Livewire\Modules\Payment;

use App\Contracts\Modules\Payment;
use App\Models\Subscription;
use App\Services\MercadoPagoService;
use App\Services\SubscriptionService;
use Exception;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class MercadoPagoPix extends Component implements Payment
{
    public string $qrCode;

    public array $subscription = [];

    public function mount($subscription) {
        $subscription['total_formated'] = $subscription['total_formated']->format();
        $this->subscription = $subscription;
    }

    public function render()
    {
        return view('livewire.modules.payment.mercado-pago-pix');
    }

    #[On('generate-pix')]
    public function generateQrCode(
        MercadoPagoService $mercadoPagoService,
        SubscriptionService $subscriptionService
    ) {
        try {
            $result = $mercadoPagoService->create($this->subscription);

            $this->qrCode = $result->point_of_interaction->transaction_data->qr_code;
        } catch (Exception $e) {
            report($e);

            $this->addError('warning', __('Não foi possível gerar o QRCode'));
        }
    }
}
