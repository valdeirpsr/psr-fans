<?php

namespace App\Http\Controllers;

use Cknow\Money\Money;
use Illuminate\Support\Carbon;

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
}
