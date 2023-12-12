<?php

namespace App\Livewire;

use Livewire\Component;

class SubscribeModal extends Component
{
    public ?string $plan = null;

    public array $plans = [];

    public function __construct()
    {
        $this->plans = [
            [
                'id' => '1',
                'name' => '1 Mês - R$49,90'
            ],
            [
                'id' => '2',
                'name' => '3 Mêses - R$42,00'
            ],
            [
                'id' => '3',
                'name' => '6 Mêses - R$37,00'
            ],
            [
                'id' => '4',
                'name' => '12 Mêses - R$35,00'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.subscribe-modal', [
            'plans' => $this->plans
        ]);
    }

    public function choosePlan()
    {
        dd(
            $this->plan,
            'Plano escolhido: ' . $this->plan,
            $this->plans[0]
        );
    }
}
