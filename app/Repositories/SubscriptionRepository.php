<?php

namespace App\Repositories;

use App\Models\Subscription;
use App\Models\User;

class SubscriptionRepository
{
    public function create(array $data): Subscription
    {
        $model = new Subscription($data);
        $model->save();

        return $model;
    }

    public function currentSubscriptionActiveByUser(User $user): ?Subscription
    {
        return Subscription::isPaid()
            ->isValid()
            ->where('user_id', $user->getAuthIdentifier())
            ->latest()
            ->first();
    }
}
