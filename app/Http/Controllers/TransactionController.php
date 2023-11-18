<?php

namespace App\Http\Controllers;

use App\Enums\TransactionStatus;
use Cknow\Money\Money;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Vite;

class TransactionController extends Controller
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

    public function status(string $status)
    {
        return view('transaction-status', [
            'color' => TransactionStatus::tryFrom($status)->getColor(),
            'status' => TransactionStatus::tryFrom($status)->getLabel(),
            'lottie' => TransactionStatus::tryFrom($status)->getLottieFile(),
        ]);
    }
}
