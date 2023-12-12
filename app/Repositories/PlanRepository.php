<?php

namespace App\Repositories;

use App\Models\Plan;
use Illuminate\Support\Collection;

class PlanRepository
{
    public function list(): Collection
    {
        return Plan::enabled()->get();
    }
}
