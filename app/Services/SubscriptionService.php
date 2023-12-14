<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Repositories\SubscriptionRepository;
use Illuminate\Contracts\Auth\Authenticatable;

class SubscriptionService
{
    public function __construct(
        private SubscriptionRepository $subscriptionRepository
    ) {

    }

    public function create(Plan $plan, User $user, string $paymentMethod): Subscription
    {
        return $this->subscriptionRepository->create([
            'user_id' => $user->getAuthIdentifier(),
            'plan_name' => $plan->name,
            'plan_price' => $plan->price,
            'plan_period' => $plan->period,
            'payment_method' => $paymentMethod,
            'total' => $plan->price,
            'expired_at' => now()->addDays($plan->period),
            'forwarded_ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
