<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Repositories\SubscriptionRepository;
use Illuminate\Database\QueryException;

class SubscriptionService
{
    public function __construct(
        private SubscriptionRepository $subscriptionRepository
    ) {
    }

    public function create(User $user, Plan $plan): ?Subscription
    {
        try {
            return $this->subscriptionRepository->create([
                'user_id' => $user->id,
                'plan_name' => $plan->name,
                'plan_price' => $plan->price,
                'plan_period' => $plan->period,
                'total' => $plan->price,
                'expired_at' => now()->addDays($plan->period),
                'forwarded_ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (QueryException $e) {
            report($e);

            return null;
        }
    }
}
