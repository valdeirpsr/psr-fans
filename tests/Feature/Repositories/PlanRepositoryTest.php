<?php

namespace Tests\Feature\Repositories;

use App\Models\Plan;
use App\Repositories\PlanRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * O método list deve retornar apenas os planos habilitado
     */
    public function test_o_metodo_list_deve_retornar_apenas_os_planos_habilitados(): void
    {
        Plan::factory(5)->create([
            'status' => false,
        ]);

        Plan::factory(10)->enabled()->create();

        $repository = new PlanRepository;
        $result = $repository->list();

        $this->assertEquals(10, $result->count());
    }
}
