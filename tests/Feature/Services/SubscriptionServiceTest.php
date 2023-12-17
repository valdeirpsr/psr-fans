<?php

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Repositories\SubscriptionRepository;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Session;
use Mockery\MockInterface;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

it('Ao criar uma assinatura, a sessão plan deve ser excluída', function () {
    Session::put('plan', 1);

    $repositoryMock = Mockery::mock(SubscriptionRepository::class, function (MockInterface $mock) {
        $mock->shouldReceive('create')->once()->andReturn(Subscription::factory()->create());
    });

    assertTrue(Session::has('plan'));

    $service = new SubscriptionService($repositoryMock);
    $service->create(
        User::factory()->create(),
        Plan::factory()->create()
    );

    assertFalse(Session::has('plan'));
});

it('Valida a formtaao dos dados', function () {
    config()->set('app.date_format', 'd/m/Y');
    config()->set('app.money', 'BRL');

    $subscription = Subscription::factory()->make([
        'expired_at' => '2014-07-13',
        'total' => 19.93,
    ]);

    $service = new SubscriptionService(new SubscriptionRepository);
    $result = $service->format($subscription);

    assertEquals('13/07/2014', $result->expired_at);
    assertEquals('R$19.93', $result->total);
});
