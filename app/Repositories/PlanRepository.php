<?php

namespace App\Repositories;

use App\Models\Plan;

class PlanRepository
{
    /**
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById($planId): Plan
    {
        return Plan::findOrFail($planId);
    }

    public function list()
    {
        return Plan::all();
    }
}
