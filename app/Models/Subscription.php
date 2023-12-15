<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
