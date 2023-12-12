<div x-data="initSubscribeModal" @open-subscribe-modal.window="isVisible = true">
    <template x-if="isVisible">
        <div class="bg-black bg-opacity-80 fixed inset-0 flex items-center p-4" @click="closeModal">
            <form x-ref="form" action="{{ route('subscribe') }}" method="post" class="container sm:max-w-[380px]">
                <img src="https://placehold.co/384x180" class="w-full max-h-80 object-cover" />

                <div class="card pt-0">
                    <div class="flex items-center space-x-4 -mt-6">
                        <img src="https://placehold.co/96" class="rounded-full border-[2px] border-white" />

                        <div>
                            <p class="font-bold">YOUR NAME</p>
                            <p class="text-sm">104 Fotos | 54 Vídeos</p>
                        </div>
                    </div>

                    <div class="my-8 px-3">
                        <b class="mb-8 block">Assine e tenha estes benefícios:</b>

                        <ul class="space-y-4 tracking-tight">
                            <li class="list-check">Acesso total ao conteúdo deste usuário </li>
                            <li class="list-check">Mensagem direta com este usuário </li>
                            <li class="list-check">Cancele sua assinatura a qualquer momento </li>
                        </ul>
                    </div>

                    <div class="mb-8">
                        <label for="input-plan" class="text-sm pl-1">Escolha seu plano</label>
                        <select name="plan" class="input-select" id="input-plan">
                            <option value="1">1 Mês - R$49,90</option>
                            <option value="3">3 Mêses - R$42,00</option>
                            <option value="6">6 Mêses - R$37,00</option>
                            <option value="12">12 Mês - R$35,00</option>
                        </select>
                    </div>

                    <div>
                        <x-inputs.button @click="$refs.form.submit()">ASSINAR</x-inputs.button>
                    </div>
                </div>
            </form>
        </div>
    </template>
</div>
