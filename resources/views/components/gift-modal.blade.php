


<div x-data="initGiftModal" @open-gift-modal.window="isVisible = true">
    <template x-if="isVisible">
        <div class="bg-black bg-opacity-80 fixed inset-0 flex items-center p-4" @click="closeModal">
            <!--
                @TODO:
                [ ]: Utilizar Ziggy Route
            -->
            <form x-ref="form" action="https://en0mg36g6h21w9.x.pipedream.net/" method="post" class="container sm:max-w-[380px]">
                <div class="card space-y-5 rounded-lg">
                    <p class="font-bold">Enviar presente</p>

                    <div>
                        <template x-if="!inputAnotherValueVisibled">
                            <div class="flex justify-between text-white text-sm">
                                <template x-for="i in values">
                                    <button
                                        type="button"
                                        :class="`p-2 bg-pink-700 rounded-full aspect-square h-[70px] font-semibold ${i === value ? 'bg-pink-900' : ''}`"
                                        x-text="`R\$${i},00`"
                                        @click="value = i"
                                    ></button>
                                </template>

                                <button
                                    type="button"
                                    class="p-2 bg-pink-700 rounded-full aspect-square h-[70px] font-semibold"
                                    @click="inputAnotherValueVisibled = true; value = ''"
                                >
                                    Outro valor
                                </button>
                            </div>
                        </template>

                        <template x-if="inputAnotherValueVisibled">
                            <input
                                type="number"
                                name="price"
                                placeholder="Informe o valor"
                                x-model="value"
                                class="border w-full rounded-lg p-2"
                                @input="value = value.replace(/\D/g, '')"
                            />
                        </template>
                    </div>

                    <div>
                        <textarea
                            name="message"
                            class="border h-32 w-full rounded-lg p-2"
                            placeholder="Escreva sua mensagem (opcional)"
                        ></textarea>
                    </div>

                    <div>
                        <button type="button" @click="closeModal">Cancelar</button>
                        <button type="submit" class="float-right" @click="$refs.form.submit()">Enviar Presente</button>
                    </div>
                </div>
            </form>
        </div>
    </template>
</div>
