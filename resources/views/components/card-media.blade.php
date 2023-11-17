<div
    class="space-y-4"
    x-data="initMediaCard({
        isLiked: false,
        url: 'https://valdeir.dev'
    })"
>
    <div class="flex items-center">
        <img src="https://placehold.co/50" class="rounded-full h-12 w-12" alt="Perfil" />
        <div class="ml-2 flex-1 text-[12px]">
            <p class="font-bold">YOUR NAME</p>
            <p class="text-gray-500">30 out 00h44</p>
        </div>
    </div>

    <div x-ref="content">
        Hoje fizemos uma trilha em Niteroi e tentamos gravar putaria mas toda hora passa alguém e conseguimos só uma foto 🙄
    </div>

    <div class="overflow-hidden">
        @if ($isPrivate)
            <div class="overflow-hidden relative w-fit grid place-items-center place-content-center m-auto">
                <img src="https://placehold.co/384" alt="Conteúdo privado" class="snap-center blur-md" height="384" width="384" />
                <x-inputs.button class="absolute w-5/6" @click="$dispatch('open-subscribe-modal')">
                    ASSINAR CONTEÚDO
                </x-inputs.button>
            </div>
        @else
            <div class="
                flex overflow-scroll snap-mandatory snap-x
                md:grid md:gap-2 md:grid-cols-2 md:overflow-hidden
                lg:grid-cols-3
            ">
                <img src="https://placehold.co/384" alt="Conteúdo" class="snap-center" decoding="async" loading="lazy" height="384" width="384" @click="openMediaViewer('https://placehold.co/384', 'image/jpeg')" />
                <video poster="https://placehold.co/384?text=Vídeo" alt="" class="snap-center" @click="openMediaViewer('https://placehold.co/384', 'video/mp4')"></video>
                <img src="https://placehold.co/384" alt="Conteúdo" class="snap-center" decoding="async" loading="lazy" height="384" width="384" @click="openMediaViewer('https://placehold.co/384', 'image/jpeg')" />
                <img src="https://placehold.co/384" alt="Conteúdo" class="snap-center" decoding="async" loading="lazy" height="384" width="384" @click="openMediaViewer('https://placehold.co/384', 'image/jpeg')" />
            </div>
        @endif
    </div>

    <div class="grid grid-cols-[24px_24px_24px_auto_min-content] gap-4">
        <x-inputs.button type="icon" @click="toggleLike" data-test="button-like" title="Gostei">
            <svg :class="{ 'fill-transparent stroke-black': !isLiked, 'fill-red-500 border-red-500': isLiked }" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" width="26" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="242 1089 26 26" height="26">
                <g width="24" height="24" rx="0" ry="0">
                    <g>
                        <g class="fills">
                            <path stroke-linecap="round" stroke-linejoin="round" rx="0" ry="0" d="M263.420,1094.580C262.407,1093.563,261.030,1092.992,259.595,1092.992C258.160,1092.992,256.783,1093.563,255.770,1094.580L255.000,1095.360L254.230,1094.580C253.217,1093.563,251.840,1092.992,250.405,1092.992C248.970,1092.992,247.593,1093.563,246.580,1094.580C244.460,1096.700,244.330,1100.280,247.000,1103.000L255.000,1111.000L263.000,1103.000C265.670,1100.280,265.540,1096.700,263.420,1094.580ZZ">
                            </path>
                        </g>
                        <g>
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" rx="0" ry="0" style="fill-opacity:none;stroke-width:2;stroke-opacity:1" d="M263.420,1094.580C262.407,1093.563,261.030,1092.992,259.595,1092.992C258.160,1092.992,256.783,1093.563,255.770,1094.580L255.000,1095.360L254.230,1094.580C253.217,1093.563,251.840,1092.992,250.405,1092.992C248.970,1092.992,247.593,1093.563,246.580,1094.580C244.460,1096.700,244.330,1100.280,247.000,1103.000L255.000,1111.000L263.000,1103.000C265.670,1100.280,265.540,1096.700,263.420,1094.580ZZ">
                                </path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </x-inputs.button>

        <x-inputs.button type="icon" @click="openComments" title="Comentários">
            <svg xmlns:xlink="http://www.w3.org/1999/xlink" fill="none" width="26" xmlns="http://www.w3.org/2000/svg"" id="screenshot-1353d6eb-ca3d-8065-8003-69041274cda4" version="1.1" viewBox="282 1089 26 26" height="26">
                <g id="shape-1353d6eb-ca3d-8065-8003-69041274cda4" style="fill:#000000" width="24" class="lucide lucide-message-circle" height="24" rx="0" ry="0">
                <g id="shape-1353d6eb-ca3d-8065-8003-690412772b8f">
                    <g class="fills" id="fills-1353d6eb-ca3d-8065-8003-690412772b8f">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round" rx="0" ry="0" style="fill:none" d="M304.000,1101.500C304.003,1102.820,303.695,1104.122,303.100,1105.300C301.661,1108.179,298.719,1109.999,295.500,1110.000C294.180,1110.003,292.878,1109.695,291.700,1109.100L286.000,1111.000L287.900,1105.300C287.305,1104.122,286.997,1102.820,287.000,1101.500C287.001,1098.281,288.821,1095.339,291.700,1093.900C292.878,1093.305,294.180,1092.997,295.500,1093.000L296.000,1093.000C300.316,1093.238,303.762,1096.684,304.000,1101.000L304.000,1101.500ZZ">
                    </path>
                    </g>
                    <g id="strokes-1353d6eb-ca3d-8065-8003-690412772b8f" class="strokes">
                    <g class="stroke-shape">
                        <path stroke-linecap="round" stroke-linejoin="round" rx="0" ry="0" style="fill:none;fill-opacity:none;stroke-width:2;stroke:#000000;stroke-opacity:1" d="M304.000,1101.500C304.003,1102.820,303.695,1104.122,303.100,1105.300C301.661,1108.179,298.719,1109.999,295.500,1110.000C294.180,1110.003,292.878,1109.695,291.700,1109.100L286.000,1111.000L287.900,1105.300C287.305,1104.122,286.997,1102.820,287.000,1101.500C287.001,1098.281,288.821,1095.339,291.700,1093.900C292.878,1093.305,294.180,1092.997,295.500,1093.000L296.000,1093.000C300.316,1093.238,303.762,1096.684,304.000,1101.000L304.000,1101.500ZZ">
                        </path>
                    </g>
                    </g>
                </g>
                </g>
            </svg>
        </x-inputs.button>

        <x-inputs.button type="icon" @click="share" title="Compartilhar">
            <svg xmlns:xlink="http://www.w3.org/1999/xlink" fill="none" width="26" xmlns="http://www.w3.org/2000/svg" id="screenshot-1353d6eb-ca3d-8065-8003-690424a8c3f1" version="1.1" viewBox="322 1089 26 26" height="26">
                <g id="shape-1353d6eb-ca3d-8065-8003-690424a8c3f1" style="fill:#000000" width="24" class="lucide lucide-send" height="24" rx="0" ry="0">
                <g id="shape-1353d6eb-ca3d-8065-8003-690424a92b60">
                    <g class="fills" id="fills-1353d6eb-ca3d-8065-8003-690424a92b60">
                    <path fill="none" stroke-linejoin="round" stroke-linecap="round" rx="0" ry="0" style="fill:none" d="M345.000,1092.000L334.000,1103.000">
                    </path>
                    </g>
                    <g id="strokes-1353d6eb-ca3d-8065-8003-690424a92b60" class="strokes">
                    <g class="stroke-shape">
                        <path stroke-linejoin="round" stroke-linecap="round" rx="0" ry="0" style="fill:none;fill-opacity:none;stroke-width:2;stroke:#000000;stroke-opacity:1" d="M345.000,1092.000L334.000,1103.000">
                        </path>
                    </g>
                    </g>
                </g>
                <g id="shape-1353d6eb-ca3d-8065-8003-690424abc307">
                    <g class="fills" id="fills-1353d6eb-ca3d-8065-8003-690424abc307">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round" rx="0" ry="0" style="fill:none" d="M345.000,1092.000L338.000,1112.000L334.000,1103.000L325.000,1099.000L345.000,1092.000ZZ">
                    </path>
                    </g>
                    <g id="strokes-1353d6eb-ca3d-8065-8003-690424abc307" class="strokes">
                    <g class="stroke-shape">
                        <path stroke-linecap="round" stroke-linejoin="round" rx="0" ry="0" style="fill:none;fill-opacity:none;stroke-width:2;stroke:#000000;stroke-opacity:1" d="M345.000,1092.000L338.000,1112.000L334.000,1103.000L325.000,1099.000L345.000,1092.000ZZ">
                        </path>
                    </g>
                    </g>
                </g>
                </g>
            </svg>
        </x-inputs.button>

        <!-- Gambiarra -->
        <span></span>

        <x-inputs.button type="icon" class="flex justify-self-end">
            <span>
                <svg xmlns:xlink="http://www.w3.org/1999/xlink" fill="none" width="26" xmlns="http://www.w3.org/2000/svg" id="screenshot-1353d6eb-ca3d-8065-8003-69043035322b" version="1.1" viewBox="519 1088 26 26" height="26">
                    <g id="shape-1353d6eb-ca3d-8065-8003-69043035322b" style="fill: #000000" width="24" class="lucide lucide-dollar-sign text-white" height="24" rx="0" ry="0">
                        <g id="shape-1353d6eb-ca3d-8065-8003-690430354bfd">
                            <g class="fills" id="fills-1353d6eb-ca3d-8065-8003-690430354bfd">
                                <path fill="none" stroke-linejoin="round" stroke-linecap="round" rx="0" ry="0" style="fill: none" d="M532.000,1091.000L532.000,1111.000" ></path>
                            </g>
                            <g id="strokes-1353d6eb-ca3d-8065-8003-690430354bfd" class="strokes">
                                <g class="stroke-shape">
                                    <path stroke-linejoin="round" stroke-linecap="round" rx="0" ry="0" style=" fill: none; fill-opacity: none; stroke-width: 2; stroke: #000000; stroke-opacity: 1;" d="M532.000,1091.000L532.000,1111.000" ></path>
                                </g>
                            </g>
                        </g>
                        <g id="shape-1353d6eb-ca3d-8065-8003-690430378aab">
                            <g class="fills" id="fills-1353d6eb-ca3d-8065-8003-690430378aab">
                                <path fill="none" stroke-linecap="round" stroke-linejoin="round" rx="0" ry="0" style="fill: none" d="M537.000,1094.000L529.500,1094.000C527.567,1094.000,526.000,1095.567,526.000,1097.500C526.000,1099.433,527.567,1101.000,529.500,1101.000L534.500,1101.000C536.433,1101.000,538.000,1102.567,538.000,1104.500C538.000,1106.433,536.433,1108.000,534.500,1108.000L526.000,1108.000" ></path>
                            </g>
                            <g id="strokes-1353d6eb-ca3d-8065-8003-690430378aab" class="strokes">
                                <g class="stroke-shape">
                                    <path stroke-linecap="round" stroke-linejoin="round" rx="0" ry="0" style=" fill: none; fill-opacity: none; stroke-width: 2; stroke: #000000; stroke-opacity: 1; " d="M537.000,1094.000L529.500,1094.000C527.567,1094.000,526.000,1095.567,526.000,1097.500C526.000,1099.433,527.567,1101.000,529.500,1101.000L534.500,1101.000C536.433,1101.000,538.000,1102.567,538.000,1104.500C538.000,1106.433,536.433,1108.000,534.500,1108.000L526.000,1108.000" ></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </span>

            <span class="whitespace-nowrap">Enviar Presente</span>
        </x-inputs.button>
    </div>
</div>
