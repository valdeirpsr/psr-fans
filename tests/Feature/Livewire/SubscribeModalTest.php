<?php

use App\Livewire\SubscribeModal;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;

use function PHPUnit\Framework\assertEquals;

uses(RefreshDatabase::class);

it('Verifica a renderização do componente', function () {
    $plan = Plan::factory()->published()->createOneQuietly();

    Livewire::test(SubscribeModal::class)
        ->assertStatus(200)
        ->assertViewHas('plans', function ($plans) use ($plan) {
            return $plans->filter(fn ($value) => $value->id === $plan->id)->count() > 0;
        });
});

it('Ao tentar criar uma assinatura com um plano falso, o usuário deverá receber um erro', function () {
    $user = User::factory()->createOneQuietly();

    Auth::loginUsingId($user->id);

    Livewire::test(SubscribeModal::class)
        ->assertStatus(200)
        ->set('plan', -1)
        ->call('createSubscribe')
        ->assertHasErrors('warning');
});

it('Ao criar uma assintura, o usuário logado deverá ser redirecionado', function () {
    $user = User::factory()->createOneQuietly();

    Auth::loginUsingId($user->id);

    $plan = Plan::factory()->published()->createOneQuietly();

    Livewire::test(SubscribeModal::class)
        ->assertStatus(200)
        ->assertViewHas('plans', function ($plans) use ($plan) {
            return $plans->filter(fn ($value) => $value->id === $plan->id)->count() > 0;
        })
        ->set('plan', $plan->id)
        ->call('createSubscribe')
        ->assertRedirect(route('payment'));
});

it('Se o usuário não estiver logado, redireciona-o para a tela de registro e uma sessão com o plano ser armazenada', function () {
    $plan = Plan::factory()->published()->createOneQuietly();

    Livewire::test(SubscribeModal::class)
        ->assertStatus(200)
        ->assertViewHas('plans', function ($plans) use ($plan) {
            return $plans->filter(fn ($value) => $value->id === $plan->id)->count() > 0;
        })
        ->set('plan', $plan->id)
        ->call('createSubscribe')
        ->assertRedirect(route('register'));

    assertEquals($plan->id, Session::get('plan'));
});

it('O valor padrão da propriedade, caso o usuário não altere no select, plan deve ser o primeiro plano', function () {
    $plan = Plan::factory()->published()->createOneQuietly();

    Livewire::test(SubscribeModal::class)
        ->assertStatus(200)
        ->call('createSubscribe');

    assertEquals($plan->id, Session::get('plan'));
});
