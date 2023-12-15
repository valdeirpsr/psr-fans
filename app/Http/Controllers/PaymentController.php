<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Models\Subscription;
use App\Services\PlanService;
use App\Services\SubscriptionService;
use Cknow\Money\Money;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{

    /**
     * @TOOD:
     * 1) Criar uma tabela de pagamento e armazenar os dados do usuário e plano escolhido.
     * 2) Acessar o serviço do Mercado Pago para gerar a chave PIX
     * 3) Acessar a rota `/pagamento/:id/confirmar` e exibir as informações na view payment
     * 4) Verificar de tempos em tempos na rota `/pagamento/:id/check`
     * 5) Se aprovado, mostrar mensagem
     */
    public function create(Request $request, PlanService $planService, SubscriptionService $subscriptionService)
    {
        $plan = $planService->getBySession();

        if (!$plan) {
            return redirect()->route('subscribe');
        }

        $subscription = $subscriptionService->create($plan, $request->user(), 'pix');

        return redirect()->route('payment.show', $subscription);
    }

    public function show(Request $request, Subscription $subscription)
    {
        return view('payment', [
            'customer' => $request->user()->only(['name']),
            'plan_name' => $subscription->plan_name,
            'expired_at' => Carbon::parse($subscription->expired_at)->format('d/m/Y'),

            'pix' => 'chave pix do mercado pago',
            'total' => Money::BRL($subscription->total),
        ]);
    }

    public function status(Subscription $subscription)
    {
        return response()->json(
            data: $subscription->only([
                'payment_status'
            ]),
            options: JSON_PRETTY_PRINT
        );
    }
}
