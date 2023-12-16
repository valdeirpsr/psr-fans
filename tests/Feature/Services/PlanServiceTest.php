<?php

use App\Repositories\PlanRepository;
use App\Services\PlanService;
use Mockery\MockInterface;

it('Ao capturar a lista de planos, deve-se retornar o valor em cache caso haja', function () {
    $repositoryMock = $this->partialMock(PlanRepository::class, function (MockInterface $mock) {
        $mock->shouldReceive('list')
            ->once()
            ->andReturn(collect());
    });

    $service = new PlanService($repositoryMock);
    $service->list();
    $service->list();
});
