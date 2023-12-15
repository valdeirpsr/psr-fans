<?php

namespace Tests\Feature\Services;

use App\Models\Plan;
use App\Repositories\PlanRepository;
use App\Services\PlanService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;;
use function PHPUnit\Framework\assertTrue;

class PlanServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->markTestSkipped();
    }

    /**
     * Se a sessão `plan` não existir, deve-se retornar null
     */
    public function test_valida_o_metodo_getBySession_com_uma_sessao_inexistente(): void
    {
        $repositoryMock = Mockery::mock(PlanRepository::class);

        $service = new PlanService($repositoryMock);
        $result = $service->getBySession();

        assertNull($result);
    }

    public function test_valida_o_metodo_getBySession_com_uma_sessao_existente_porem_invalida(): void
    {
        $repositoryMock = Mockery::mock(PlanRepository::class);

        Session::put('plan', null);

        $service = new PlanService($repositoryMock);
        $result = $service->getBySession();

        assertNull($result);
    }

    public function test_valida_o_metodo_getBySession_com_uma_sessao_valida(): void
    {
        $repositoryMock = Mockery::mock(PlanRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')->once()->with(1)->andReturn(
                Plan::factory()->enabled()->make()
            );
        });

        Session::put('plan', 1);

        $service = new PlanService($repositoryMock);
        /** @var Plan $result */
        $result = $service->getBySession();

        assertTrue($result['status']);
    }

    public function test_valida_o_metodo_getBySession_com_uma_sessao_valida_e_um_plano_desabilitado(): void
    {
        $repositoryMock = Mockery::mock(PlanRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')->once()->with(1)->andThrow(ModelNotFoundException::class);
        });

        Session::put('plan', 1);

        $service = new PlanService($repositoryMock);
        $result = $service->getBySession();

        assertNull($result);
    }
}
