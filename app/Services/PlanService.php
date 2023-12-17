<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\PlanRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PlanService
{
    public function __construct(
        private PlanRepository $planRepository
    ) {
    }

    public function findById($planId): Plan
    {
        return $this->planRepository->findById($planId);
    }

    public function list(): Collection
    {
        return Cache::remember(
            'plan-list',
            now()->addWeek(),
            fn () => $this->planRepository->list()
        );
    }
}
