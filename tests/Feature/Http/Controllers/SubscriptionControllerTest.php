<?php

use App\Models\Plan;
use Illuminate\Support\Facades\Session;

test('Usuários deslogados deverão ser redirecionados para a tela de login', function () {
    test()->get(route('subscription.store'))
        ->assertRedirectToRoute('login');
});

test('Se a sessão não estiver definida, o usuário deverá receber o erro 404', function () {
    $response = asLogged()->get(route('subscription.store'));

    $response->assertRedirectToRoute('home')
        ->assertSessionHas('warning');
});

test('Se a sessão for inválida, o usuário deverá receber o erro 404', function () {
    Session::put('plan', -1);
    $response = asLogged()->get(route('subscription.store'));

    $response->assertNotFound();
});

test('O usuário deve ser redirecionado para a tela de pagamento se a sessão existir e for válida', function () {
    $plan = Plan::factory()->createQuietly();
    Session::put('plan', $plan->id);

    asLogged()->get(route('subscription.store'))
        ->assertRedirectToRoute('payment');
});

todo('Adicionar histórico de assinaturas do usuário');
