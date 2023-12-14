<?php

namespace App\Repositories;

use App\Models\Subscription;

class SubscriptionRepository
{
    public function create(array $data): Subscription
    {
        $model = new Subscription($data);
        $model->save();

        return $model;
    }
}
