<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use Cknow\Money\Money;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        return view('transaction', [
            'resume' => [
                'Nome' => 'Valdeir Psr',
                'Plano' => '1 Mês - R$99,99',
                'Expira em' => Carbon::now()->addMonth()->format('d M Y')
            ],
            'pix' => 'chave pix',
            'total' => Money::BRL(9000),
        ]);
    }

    public function create(Request $request)
    {
        /* Code Here */
    }

    public function status(string $status)
    {
        return view('transaction-status', [
            'color' => PaymentStatus::tryFrom($status)->getColor(),
            'status' => PaymentStatus::tryFrom($status)->getLabel(),
            'lottie' => PaymentStatus::tryFrom($status)->getLottieFile(),
        ]);
    }
}
