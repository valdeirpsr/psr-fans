<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'model_id',
        'user_name',
        'user_email',
        'user_cpf',
        'code',
        'method',
        'status',
        'expired_at',
        'raw',
    ];
}
