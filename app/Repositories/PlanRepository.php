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

    public function get(int $id)
    {
        return Plan::enabled()->where('id', $id)->firstOrFail();
    }
}
