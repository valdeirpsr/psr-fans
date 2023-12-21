<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function create(array $data = [])
    {
        $model = new Payment($data);
        $model->saveOrFail();

        return $model;
    }
}
