<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\PlanFactory factory()
 */
class Plan extends Model
{
    use HasFactory;

    public function scopeEnabled(Builder $query): void
    {
        $query->where('status', true);
    }
}
