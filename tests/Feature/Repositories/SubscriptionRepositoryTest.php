<?php

namespace Tests\Feature\Repositories;

use App\Models\Plan;
use App\Models\Subscription;
use App\Repositories\PlanRepository;
use App\Repositories\SubscriptionRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
}
