<?php

namespace Tests\Feature\Repositories;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Repositories\PlanRepository;
use App\Repositories\SubscriptionRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class SubscriptionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_cria_uma_assinatura(): void
    {
        $subFake = Subscription::factory()->make();

        $repository = new SubscriptionRepository;
        $repository->create($subFake->toArray());

        $this->assertDatabaseCount('subscriptions', 1);
    }

    public function test_valida_captura_da_assinatura_ativa_mais_recente_do_usuario(): void
    {
        $user = User::factory()->createQuietly();

        Subscription::factory()->expired()->make([
            'user_id' => $user->id,
        ]);

        Subscription::factory()->paymentApproved()->createQuietly([
            'user_id' => $user->id,
            'created_at' => now()->subDay()
        ]);

        $expected = Subscription::factory()->paymentApproved()->createQuietly([
            'user_id' => $user->id,
            'created_at' => now()
        ]);

        $repository = new SubscriptionRepository;
        $result = $repository->currentSubscriptionActiveByUser($user);

        assertEquals(
            $expected->id,
            $result->id
        );
    }
}
