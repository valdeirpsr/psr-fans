<?php

use App\Models\Plan;
use App\Repositories\PlanRepository;

use function PHPUnit\Framework\assertCount;

it('Ao listar os planos, apenas os publicados devem ser retornados', function () {
    Plan::factory()->draft()->createOneQuietly();
    Plan::factory()->published()->createOneQuietly();

    $repository = new PlanRepository;
    $result = $repository->list();

    assertCount(1, $result);
});
