<?php

namespace App\Models;

use App\Enums\PlanStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $period
 * @property string $status
 *
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

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('published', function (Builder $query) {
            $query->where('status', PlanStatus::PUBLISHED);
        });
    }
}
