<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\PlanRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PlanService
{
    public const CACHE_KEY_LIST_PLAN = 'plan-list';

    public const CACHE_TTL_A_DAY_IN_SECONDS = 86400;

    public function __construct(
        private PlanRepository $planRepository
    ) {
    }

    public function list(): Collection
    {
        $cacheKey = self::CACHE_KEY_LIST_PLAN;

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $result = $this->planRepository->list();

        Cache::put($cacheKey, $result, self::CACHE_TTL_A_DAY_IN_SECONDS);

        return $result;
    }

    public function getBySession(): ?Plan
    {
        if (!session()->has('plan')) {
            return null;
        }

        if (empty($plan = session()->get('plan'))) {
            return null;
        }

        try {
            return $this->planRepository->get((int) $plan);
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }
}
