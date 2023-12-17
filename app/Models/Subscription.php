<?php

namespace App\Models;

use App\Models\Scopes\NotExpiredScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $plan_name
 * @property float $plan_price
 * @property int $plan_period
 * @property float $total
 * @property string $expired_at
 * @property string $forwarded
 * @property string $user_agent
 *
 * @method static \Database\Factories\SubscriptionFactory factory()
 * @method static Builder latest()
 * @method static Builder notExpired()
 */
class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_name',
        'plan_price',
        'plan_period',
        'total',
        'expired_at',
        'forwarded_ip',
        'user_agent',
    ];

    /**
     * Scope a query to only not expired subscriptions
     */
    public function scopeNotExpired(Builder $query): void
    {
        $query->whereDate('expired_at', '<=', now());
    }
}
