<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\PlanFactory factory()
 */
class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'period',
        'status',
    ];
}
