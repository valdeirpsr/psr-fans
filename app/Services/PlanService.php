<?php

namespace App\Services;

use App\Repositories\PlanRepository;
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
}
