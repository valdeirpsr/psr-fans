<?php

use App\Models\Plan;
use App\Repositories\PlanRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Foundation\Testing\RefreshDatabase;
use function PHPUnit\Framework\assertCount;

uses(RefreshDatabase::class);

it('Ao listar os planos, apenas os publicados devem ser retornados', function () {
    Plan::factory()->draft()->createOneQuietly();
    Plan::factory()->published()->createOneQuietly();

    $repository = new PlanRepository;
    $result = $repository->list();

    assertCount(1, $result);
});

it('Ao capturar um plano, se esse não existir, deve-se lançar uma exception', function () {
    $repository = new PlanRepository;
    $repository->findById(0);
})->throws(ModelNotFoundException::class);
