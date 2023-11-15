<div x-data="initCommentDialog()">
    <template x-if="isVisible">
        <div
            class="bg-black bg-opacity-80 fixed inset-0 p-4"
            @click="closeModal"
        >
            <div
                class="bg-white rounded-md h-full p-4 text-sm text-gray-700 flex flex-col m-auto md:w-10/12 lg:w-7/12"
            >
                <div>
                    <span class="float-left leading-[32px]">Comentários</span>
                    <span class="text-2xl float-right">&times;</span>
                </div>

                <hr class="divide-x-[100%] my-4" />

                <div class="space-y-4 flex-auto overflow-auto">
                    <x-user-comment />
                </div>

                <div class="mt-4 relative">
                    <textarea
                        class="border w-full rounded-md h-20 pr-[80px] py-4 pl-4"
                        x-model="comment"
                    ></textarea>

                    <x-inputs.button
                        type="icon"
                        class="stroke-pink-600 text-pink-600 absolute top-10 right-0 mr-4 -mt-2"
                        @click="send"
                    >
                        <svg
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="20"
                            height="20"
                            xmlns="http://www.w3.org/2000/svg"
                            version="1.1"
                            viewBox="322 1089 26 26"
                        >
                            <g width="24" height="24" rx="0" ry="0">
                                <g>
                                    <g>
                                        <path
                                            stroke-linejoin="round"
                                            stroke-linecap="round"
                                            rx="0"
                                            ry="0"
                                            d="M345.000,1092.000L334.000,1103.000"
                                        ></path>
                                    </g>
                                    <g>
                                        <g class="stroke-shape">
                                            <path
                                                stroke-linejoin="round"
                                                stroke-linecap="round"
                                                rx="0"
                                                ry="0"
                                                style="
                                                    stroke-width: 2;
                                                    stroke-opacity: 1;
                                                "
                                                d="M345.000,1092.000L334.000,1103.000"
                                            ></path>
                                        </g>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            rx="0"
                                            ry="0"
                                            style="fill: none"
                                            d="M345.000,1092.000L338.000,1112.000L334.000,1103.000L325.000,1099.000L345.000,1092.000ZZ"
                                        ></path>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                rx="0"
                                                ry="0"
                                                style="
                                                    fill: none;
                                                    stroke-width: 2;
                                                    stroke-opacity: 1;
                                                "
                                                d="M345.000,1092.000L338.000,1112.000L334.000,1103.000L325.000,1099.000L345.000,1092.000ZZ"
                                            ></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        <span>Enviar</span>
                    </x-inputs.button>
                </div>
            </div>
        </div>
    </template>
</div>
