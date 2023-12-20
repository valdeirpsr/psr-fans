<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Repositories\SubscriptionRepository;
use Cknow\Money\Money;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class SubscriptionService
{
    public function __construct(
        private SubscriptionRepository $subscriptionRepository
    ) {
    }

    public function create(User $user, Plan $plan): ?Subscription
    {
        try {
            $model = $this->subscriptionRepository->create([
                'user_id' => $user->id,
                'plan_name' => $plan->name,
                'plan_price' => $plan->price,
                'plan_period' => $plan->period,
                'total' => $plan->price,
                'expired_at' => now()->addDays($plan->period),
                'forwarded_ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);

            Session::remove('plan');

            return $model;
        } catch (QueryException $e) {
            report($e);

            return null;
        }
    }

    /**
     * Formata os valores necessários da assinatura
     */
    public function format(Subscription $subscription): Subscription
    {
        $subscription->expired_at = Carbon::parse($subscription->expired_at)->format(config('app.date_format'));
        $subscription->total_formated = Money::{config('app.money')}($subscription->total);

        return $subscription;
    }
}
