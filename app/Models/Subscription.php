<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\SubscriptionFactory factory()
 */
class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_cpf',
        'plan_name',
        'plan_price',
        'plan_period',
        'payment_method',
        'payment_status',
        'total',
        'expired_at',
        'forwarded_ip',
        'user_agent',
    ];

    public function scopeIsPaid(Builder $query): void
    {
        $query->where('payment_status', PaymentStatus::APPROVED);
    }

    public function scopeIsValid(Builder $query): void
    {
        $query->whereDate('expired_at', '>=', now());
    }
}
