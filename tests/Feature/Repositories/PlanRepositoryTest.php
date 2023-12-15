<?php

namespace Tests\Feature\Repositories;

use App\Models\Plan;
use App\Repositories\PlanRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

        $this->assertCount(10, $result);
    }

    public function test_o_metodo_get_deve_retornar_um_plano_de_assinatura_habilitado_de_acordo_com_o_id(): void
    {
        Plan::factory(10)->create();

        Plan::factory()->enabled()->createOne([
            'name' => 'Special',
            'id' => 1000,
        ]);

        $repository = new PlanRepository;
        $result = $repository->get(1000);

        $this->assertEquals('Special', $result['name']);
    }

    public function test_se_o_plano_capturado_estiver_desabilitado_devera_retornar_uma_exception(): void
    {
        $this->expectException(ModelNotFoundException::class);

        Plan::factory()->createOne([
            'id' => 1000,
            'status' => false,
        ]);

        $repository = new PlanRepository;
        $repository->get(1000);
    }
}
