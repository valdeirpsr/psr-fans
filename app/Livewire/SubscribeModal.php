<?php

namespace App\Livewire;

use App\Models\Plan;
use App\Services\PlanService;
use Livewire\Component;

class SubscribeModal extends Component
{
    public ?string $plan = null;

    public array $plans = [];

    public function mount(PlanService $planService)
    {
        $this->plans = $planService->list()->map(fn (Plan $plan) => [
            'id' => $plan['id'],
            'name' => $plan['name'],
        ])->toArray();
    }

    public function render()
    {
        return view('livewire.subscribe-modal', [
            'plans' => $this->plans
        ]);
    }

    public function choosePlan()
    {
        $plan = $this->plan ?: $this->plans[0]['id'] ?? null;

        if ($plan) {
            session()->put('plan', $plan);
            return redirect()->route('register');
        }

        $this->addError('warning', __('É necessário escolher um plano antes prosseguir'));
    }
}
