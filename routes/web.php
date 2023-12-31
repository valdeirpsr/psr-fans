<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/registrar', [AuthController::class, 'register'])->name('subscribe');

Route::get('/assinar', [SubscribeController::class, 'index'])->name('subscribe');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('timeline');
    });

    Route::get('/pagamento', [PaymentController::class, 'create'])->name('payment');
    Route::get('/pagamento/{subscription}', [PaymentController::class, 'show'])->name('payment.show');

    Route::get('/pagamento/{subscription}/status', [PaymentController::class, 'status']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
