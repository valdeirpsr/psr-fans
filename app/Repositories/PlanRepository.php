<?php

namespace App\Repositories;

use App\Models\Plan;

class PlanRepository
{
    public function list()
    {
        return Plan::all();
    }
}
