<?php

namespace App\Services;

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

class MercadoPagoService
{
    public function __construct()
    {
        MercadoPagoConfig::setAccessToken(config('payment.mercadopagopix.access_token'));
    }

    public function create(array $data = [])
    {
        $client = new PaymentClient;
        $payment = $client->create([
            'transaction_amount' => (float) $data['total'],
            'description' => $data['plan_name'],
            'payment_method_id' => 'pix',
            'date_of_expiration' => now()->addHour()->format('Y-m-d\TH:i:s.vP'),
            'payer' => [
                'email' => 'test@test.com',
                'first_name' => 'First name',
                'last_name' => 'Last Name',
            ]
        ]);

        return $payment;
    }
}
