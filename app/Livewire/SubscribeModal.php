<?php

namespace App\Livewire;

use App\Models\Subscription;
use App\Services\PlanService;
use App\Services\SubscriptionService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubscribeModal extends Component
{
    public Collection $plans;

    public int $plan;

    public function mount(PlanService $planService)
    {
        $this->plans = $planService->list();
    }

    public function render()
    {
        return view('livewire.subscribe-modal');
    }

    public function createSubscribe(SubscriptionService $subscriptionService)
    {
        if (empty($this->plan)){
            $plan = $this->plans->first();
        } else {
            $plan = $this->plans->filter(fn ($plan) => $plan->id === $this->plan)->first();
        }

        if (!$plan) {
            $this->addError('warning', __('Erro ao criar assinatura. O plano escolhido é inválido'));
            return;
        }

        if (! Auth::check()) {
            session()->put('plan', $plan->id);
            return redirect()->route('register');
        }

        /** @var \App\Models\User $user */
        $user = auth()->user();

        $result = $subscriptionService->create(
            $user,
            $plan
        );

        if ($result) {
            return redirect()->route('payment.show', [$result]);
        }

        $this->addError('warning', __('Erro ao criar assinatura. Tente novamente mais tarde'));
    }
}
