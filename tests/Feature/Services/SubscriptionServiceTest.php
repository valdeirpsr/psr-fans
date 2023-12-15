<?php

namespace Tests\Feature\Services;

use App\Enums\PaymentStatus;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Repositories\SubscriptionRepository;
use App\Services\SubscriptionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class SubscriptionServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_valida_as_informacoes_da_assinatura_criada()
    {
        $this->freezeTime(function () {
            $user = User::factory()->createOneQuietly();
            $plan = Plan::factory()->createOneQuietly();

            $repositoryMock = Mockery::mock(SubscriptionRepository::class, function (MockInterface $mock) use ($user, $plan) {
                $sub = Subscription::factory()->createQuietly();

                $mock->shouldIgnoreMissing();

                $mock->shouldReceive('create')
                    ->once()
                    ->with([
                        'user_id' => $user->getAuthIdentifier(),
                        'customer_name' => $user->getAuthIdentifierName(),
                        'customer_email' => $user['email'],
                        'customer_cpf' => $user['customer_cpf'],
                        'plan_name' => $plan->name,
                        'plan_price' => $plan->price,
                        'plan_period' => $plan->period,
                        'payment_method' => 'pix',
                        'payment_status' => PaymentStatus::PENDING,
                        'total' => $plan->price,
                        'expired_at' => now()->addDays($plan->period),
                        'forwarded_ip' => '127.0.0.1',
                        'user_agent' => 'Symfony',
                    ])
                    ->andReturn($sub);
            });

            $service = new SubscriptionService($repositoryMock);
            $service->create($plan, $user, 'pix');
        });
    }
}
