<?php

namespace App\Livewire\Modules\Payment;

use App\Contracts\Modules\Payment;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class MercadoPagoPix extends Component implements Payment
{
    public string $qrCode;

    public array $subscription = [];

    public function mount($subscription) {
        $subscription['total'] = $subscription['total']->format();
        $this->subscription = $subscription;
    }

    public function render()
    {
        return view('livewire.modules.payment.mercado-pago-pix');
    }

    #[On('generate-pix')]
    public function generateQrCode()
    {
        /* Conexão com o Mercado Pago */
    }
}
