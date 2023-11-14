<?php

namespace Tests\Feature\View\Components;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardMediaTest extends TestCase
{
    /**
     * Se o componente tiver privado o usuario devera ver o botao assinar conteudo
     */
    public function test_se_o_componente_tiver_privado_o_usuario_devera_ver_o_botao_assinar_conteudo(): void
    {
        $response = $this->view('components.card-media', [
            'isPrivate' => true
        ]);

        $response->assertSeeText('ASSINAR CONTEÚDO');
    }

    /**
     * Se o componente tiver privado o usuario NÃO devera ver o botao assinar conteudo
     */
    public function test_o_botao_assinar_conteudo_devera_ser_ocultado_para_card_nao_privado(): void
    {
        $response = $this->view('components.card-media', [
            'isPrivate' => false
        ]);

        $response->assertDontSeeText('ASSINAR CONTEÚDO');
    }
}
