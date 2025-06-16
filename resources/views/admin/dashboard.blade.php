@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col bg-gradient-to-t from-[#052f43] to-[#032c40]">
        <x-navbar user-name="{{ Auth::user()->username }}" user-role="Administrador" logo-path="images/logoNova.png" />

        <div class="flex-grow flex flex-col justify-center px-4 py-8">
            <h1 class="text-3xl md:text-4xl font-extrabold text-center mb-8 md:mb-12 text-amber-300">Aplicaciones</h1>

            <ul class="grid sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-6 md:gap-8 max-w-6xl mx-auto">

                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('users.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-12 w-12">
                                <path fill="currentColor"
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Usuarios</p>
                    </a>
                </li>

                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('customers.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-12 w-12">
                                <path fill="currentColor"
                                    d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7l131.7 0c0 0 0 0 .1 0l5.5 0 112 0 5.5 0c0 0 0 0 .1 0l131.7 0c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2L224 304l-19.7 0c-12.4 0-20.1 13.6-13.7 24.2z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Clientes</p>
                    </a>
                </li>

                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('quotations.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-12 w-12">
                                <path fill="currentColor"
                                    d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 256l0-48c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Cotizaciones</p>
                    </a>
                </li>
                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('operations.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-12 w-12">
                                <!-- Engranaje minimalista -->
                                <circle cx="256" cy="256" r="120" fill="none" stroke="currentColor"
                                    stroke-width="40" />
                                <circle cx="256" cy="256" r="60" fill="currentColor" />

                                <!-- Dientes (8 dientes) -->
                                <g stroke="currentColor" stroke-width="40" stroke-linecap="square">
                                    <line x1="256" y1="60" x2="256" y2="140" />
                                    <line x1="371" y1="141" x2="316" y2="196" />
                                    <line x1="452" y1="256" x2="372" y2="256" />
                                    <line x1="371" y1="371" x2="316" y2="316" />
                                    <line x1="256" y1="452" x2="256" y2="372" />
                                    <line x1="141" y1="371" x2="196" y2="316" />
                                    <line x1="60" y1="256" x2="140" y2="256" />
                                    <line x1="141" y1="141" x2="196" y2="196" />
                                </g>
                            </svg>
                        </div>
                        <p class="text-center font-medium">Operaciones</p>
                    </a>
                </li>
                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('reports.quotations') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <!-- ICONO NUEVO PARA REPORTES -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1 2v14h14V5H5zm3 3h8v2H8V8zm0 4h8v2H8v-2z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Reportes</p>
                    </a>
                </li>
                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('continents.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="h-12 w-12">
                                <g transform="translate(0,256) scale(0.1,-0.1)" fill="currentColor" stroke="none">
                                    <path
                                        d="M1140 2554 c-84 -11 -201 -39 -280 -66 -191 -68 -331 -157 -481 -307 -188 -188 -299 -392 -355 -651 -26 -119 -26 -381 0 -500 56 -259 167 -463 355 -651 188 -188 392 -299 651 -355 119 -26 381 -26 500 0 168 36 328 104 470 199 96 64 273 241 337 337 296 442 296 998 0 1440 -64 96 -241 273 -337 337 -139 93 -286 157 -450 194 -83 19 -329 33 -410 23z m125 -120 c-19 -25 -35 -57 -35 -70 0 -40 -43 -60 -266 -124 -110 -31 -118 -43 -175 -255 -28 -105 -26 -120 24 -165 51 -48 80 -50 122 -10 20 20 81 49 188 90 87 33 166 60 175 60 10 0 44 -27 77 -61 79 -80 92 -85 173 -58 l64 21 67 -66 66 -66 3 -99 c4 -90 6 -101 29 -123 20 -19 37 -24 104 -27 103 -4 131 8 174 74 18 29 38 56 45 60 27 17 58 -8 120 -96 47 -66 75 -96 99 -106 41 -17 89 -11 124 17 l26 20 7 -47 c4 -26 4 -108 1 -182 -13 -305 -129 -565 -351 -787 -222 -222 -482 -338 -787 -351 -261 -11 -495 49 -695 178 l-70 46 12 122 12 121 62 59 c68 64 68 62 39 158 -11 34 -11 52 0 92 15 58 9 85 -27 123 -28 31 -75 49 -124 50 -45 0 -103 35 -187 112 -86 80 -115 88 -213 59 l-68 -20 0 62 0 63 95 4 c86 3 97 5 120 29 31 30 34 52 16 107 -17 51 -9 85 24 100 29 13 236 320 255 378 20 59 9 170 -23 235 -15 31 -27 59 -27 63 0 3 39 32 87 63 183 120 401 189 600 192 l73 1 -35 -46z m335 4 c394 -109 729 -441 837 -829 l17 -60 -36 -36 c-51 -51 -69 -43 -147 68 -71 100 -107 125 -169 115 -41 -6 -75 -35 -109 -94 l-25 -43 -71 3 -71 3 -4 90 c-2 49 -10 101 -17 115 -7 14 -47 58 -88 98 -84 81 -95 84 -179 52 l-52 -20 -66 64 c-94 91 -99 92 -306 15 -93 -34 -184 -73 -202 -87 -30 -22 -35 -23 -49 -9 -14 14 -13 26 12 117 42 161 30 149 200 191 28 7 84 27 125 44 77 33 93 49 105 109 3 15 28 52 55 81 l50 52 58 -9 c31 -5 91 -18 132 -30z m-1076 -390 c4 -21 4 -54 0 -74 -9 -48 -190 -320 -254 -382 -47 -45 -50 -51 -50 -98 0 -27 7 -59 15 -70 8 -12 11 -24 8 -28 -3 -3 -41 -6 -83 -6 l-78 0 6 48 c23 221 148 483 313 657 l73 76 22 -43 c12 -24 24 -60 28 -80z m-208 -967 c82 -77 144 -113 211 -122 70 -10 107 -33 99 -62 -17 -57 -17 -114 -2 -157 l16 -45 -56 -50 -56 -51 -14 -109 c-8 -60 -16 -110 -18 -112 -9 -9 -174 178 -223 254 -87 133 -165 332 -175 443 -3 34 -1 36 47 52 84 29 100 25 171 -41z" />
                                    <path
                                        d="M1002 1711 c-98 -7 -103 -11 -161 -131 -33 -69 -36 -82 -36 -167 0 -113 1 -115 158 -243 92 -75 129 -112 174 -179 l57 -83 -13 -57 c-26 -110 -25 -116 19 -244 24 -67 53 -133 64 -145 29 -33 89 -62 126 -62 78 0 170 70 170 129 1 53 32 113 79 150 23 18 46 42 52 54 7 11 15 72 20 134 l9 115 67 81 c90 109 91 129 6 206 -45 41 -84 93 -144 191 -45 74 -92 146 -104 158 -13 14 -51 32 -91 43 -83 23 -108 24 -124 4 -22 -27 -74 -18 -124 20 -50 38 -44 37 -204 26z m161 -91 c62 -49 135 -62 187 -35 25 13 38 13 77 4 27 -7 53 -16 59 -21 6 -4 53 -76 104 -158 65 -106 106 -162 141 -191 l49 -41 -59 -71 c-32 -40 -63 -81 -68 -92 -6 -11 -14 -70 -18 -132 l-8 -112 -47 -40 c-54 -46 -90 -110 -90 -163 0 -72 -94 -114 -152 -68 -18 13 -36 53 -63 133 l-39 114 19 75 c10 42 15 86 11 101 -3 14 -34 67 -67 116 -51 76 -81 106 -180 186 -65 52 -124 105 -131 117 -24 45 -13 134 26 214 l37 73 47 4 c117 9 139 7 165 -13z" />
                                </g>
                            </svg>
                        </div>
                        <p class="text-center font-medium">Continentes</p>
                    </a>
                </li>

                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('countries.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-12 w-12">
                                <path fill="currentColor"
                                    d="M64 32C64 14.3 49.7 0 32 0S0 14.3 0 32L0 64 0 368 0 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-128 64.3-16.1c41.1-10.3 84.6-5.5 122.5 13.4c44.2 22.1 95.5 24.8 141.7 7.4l34.7-13c12.5-4.7 20.8-16.6 20.8-30l0-247.7c0-23-24.2-38-44.8-27.7l-9.6 4.8c-46.3 23.2-100.8 23.2-147.1 0c-35.1-17.6-75.4-22-113.5-12.5L64 48l0-16z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Paises</p>
                    </a>
                </li>

                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('cities.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="h-12 w-12">
                                <path fill="currentColor"
                                    d="M480 48c0-26.5-21.5-48-48-48L336 0c-26.5 0-48 21.5-48 48l0 48-64 0 0-72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 72-64 0 0-72c0-13.3-10.7-24-24-24S64 10.7 64 24l0 72L48 96C21.5 96 0 117.5 0 144l0 96L0 464c0 26.5 21.5 48 48 48l256 0 32 0 96 0 160 0c26.5 0 48-21.5 48-48l0-224c0-26.5-21.5-48-48-48l-112 0 0-144zm96 320l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16zM240 416l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16zM128 400c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32zM560 256c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0zM256 176l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16zM112 160c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0zM256 304c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32zM112 320l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16zm304-48l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16zM400 64c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0zm16 112l0 32c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Ciudades</p>
                    </a>
                </li>

                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('services.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="h-12 w-12">
                                <path fill="currentColor"
                                    d="M171.3 96L224 96l0 96-112.7 0 30.4-75.9C146.5 104 158.2 96 171.3 96zM272 192l0-96 81.2 0c9.7 0 18.9 4.4 25 12l67.2 84L272 192zm256.2 1L428.2 68c-18.2-22.8-45.8-36-75-36L171.3 32c-39.3 0-74.6 23.9-89.1 60.3L40.6 196.4C16.8 205.8 0 228.9 0 256L0 368c0 17.7 14.3 32 32 32l33.3 0c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80l130.7 0c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80l33.3 0c17.7 0 32-14.3 32-32l0-48c0-65.2-48.8-119-111.8-127z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Servicios</p>
                    </a>
                </li>

                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('incoterms.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-12 w-12">
                                <path fill="currentColor"
                                    d="M482.3 192c34.2 0 93.7 29 93.7 64c0 36-59.5 64-93.7 64l-116.6 0L265.2 495.9c-5.7 10-16.3 16.1-27.8 16.1l-56.2 0c-10.6 0-18.3-10.2-15.4-20.4l49-171.6L112 320 68.8 377.6c-3 4-7.8 6.4-12.8 6.4l-42 0c-7.8 0-14-6.3-14-14c0-1.3 .2-2.6 .5-3.9L32 256 .5 145.9c-.4-1.3-.5-2.6-.5-3.9c0-7.8 6.3-14 14-14l42 0c5 0 9.8 2.4 12.8 6.4L112 192l102.9 0-49-171.6C162.9 10.2 170.6 0 181.2 0l56.2 0c11.5 0 22.1 6.2 27.8 16.1L365.7 192l116.6 0z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Incoterms</p>
                    </a>
                </li>


                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('exchange-rates.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-12 w-12">
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="M245,0C109.683,0,0,109.684,0,245s109.683,245,245,245s245-109.683,245-245S380.316,0,245,0z M245,459.375 c-118.212,0-214.375-96.163-214.375-214.375c0-118.213,96.163-214.375,214.375-214.375c118.213,0,214.375,96.162,214.375,214.375 C459.375,363.212,363.212,459.375,245,459.375z"
                                    fill="#000000" style="fill: rgb(255, 255, 255);" />
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="M258.199,219.29v-57.192c9.463,4.104,15.313,11.898,17.548,23.398l37.026-4.824c-2.542-14.623-8.391-26.307-17.548-35.035 c-9.187-8.728-21.514-14.026-37.026-15.879v-14.486h-21.208v14.47c-16.782,1.654-30.227,7.932-40.318,18.819 c-10.091,10.872-15.144,24.301-15.144,40.302c0,15.803,4.471,29.232,13.398,40.318c8.912,11.071,22.938,19.34,42.063,24.791v61.311 c-5.283-2.542-10.045-6.646-14.348-12.296c-4.303-5.65-7.228-12.388-8.774-20.182l-38.189,4.104 c2.925,19.217,9.662,34.086,20.182,44.621c10.535,10.535,24.24,16.828,41.129,18.865v26.628h21.208v-27.363 c19.018-2.726,33.871-10.137,44.559-22.234c10.673-12.097,16.017-26.98,16.017-44.62c0-15.803-4.242-28.757-12.725-38.848 C297.552,233.853,281.612,225.63,258.199,219.29z M236.992,212.277c-6.355-2.741-11.086-6.324-14.21-10.765 c-3.108-4.425-4.686-9.233-4.686-14.394c0-5.65,1.7-10.826,5.13-15.512c3.415-4.701,7.993-7.993,13.751-9.953v50.623H236.992z M276.054,307.169c-4.594,5.421-10.535,8.805-17.854,10.168v-57.07c8.774,2.542,15.098,6.171,18.942,10.902 c3.859,4.732,5.788,10.367,5.788,16.905C282.929,295.378,280.632,301.748,276.054,307.169z"
                                    fill="#000000" style="fill: rgb(255, 255, 255);" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Monedas</p>
                    </a>
                </li>

                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('quantity_descriptions.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-12 w-12">
                                <path fill="currentColor"
                                    d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Descripcion de <br /> productos</p>
                    </a>
                </li>

                <li
                    class="p-6 rounded-full hover:bg-[#131f24] transition-colors duration-150 ease-in text-white hover:text-amber-500">
                    <a href="{{ route('audits.index') }}" class="flex flex-col items-center">
                        <div class="p-4 rounded-full mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-12 w-12">
                                <path fill="currentColor"
                                    d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z" />
                            </svg>
                        </div>
                        <p class="text-center font-medium">Historial</p>
                    </a>
                </li>


            </ul>
        </div>
    @endsection
