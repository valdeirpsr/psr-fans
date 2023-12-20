<?php

namespace App\Http\Controllers;

use App\Contracts\Modules\Payment;
use App\Livewire\Modules\Payment\MercadoPagoPix;
use App\Models\Subscription;
use App\Services\SubscriptionService;
use Cknow\Money\Money;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    public function show(Subscription $subscription, SubscriptionService $subscriptionService)
    {
        return view('payment.resume', [
            'subscription' => $subscriptionService->format($subscription)->toArray(),
            'paymentMethods' => [
                MercadoPagoPix::class,
            ]
        ]);
    }
}
