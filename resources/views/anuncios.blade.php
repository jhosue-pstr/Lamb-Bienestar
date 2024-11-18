<x-app-layout>
    <!-- Barra Verde Superior con Logotipo -->
    <header class="py-1 bg-green-700">
        <div class="flex items-center mx-auto max-w-7xl">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('imagenes/logo1.png') }}" alt="LAMB University" class="w-auto h-16 relative left-[-180px] mr-2">
            </a>
        </div>
    </header>

    <!-- Carrusel dinámico con Alpine.js -->
    @php $totalSlides = count($anuncios); @endphp
    <div x-data="{ activeSlide: 0, totalSlides: {{ $totalSlides }}, interval: null }"
         x-init="interval = setInterval(() => activeSlide = (activeSlide + 1) % totalSlides, 10000)"
         class="relative max-w-5xl mx-auto my-10 overflow-hidden">

        <!-- Contenedor de Slides -->
        <div class="relative flex transition-transform duration-700"
             :style="'transform: translateX(-' + activeSlide * 100 + '%)'"
             style="width: {{ $totalSlides * 100 }}%;">

            <!-- Generar dinámicamente los slides desde la base de datos -->
            @foreach ($anuncios as $index => $anuncio)
            <a href="{{ route('mas-informacion2', ['id' => $anuncio->id]) }}" class="flex items-center justify-center flex-shrink-0 w-full p-10" style="width: 100%;">
                <div class="w-1/2">
                    <img src="{{ asset($anuncio->afiche) }}" alt="Afiche del anuncio" class="object-cover w-full rounded-lg shadow-lg h-96">
                </div>
                <div class="w-1/2 p-8 bg-gray-100 rounded-lg shadow-lg">
                    <h2 class="mb-4 text-3xl font-bold">{{ $anuncio->nombre }}</h2>
                    <p class="mb-2 text-xl"><strong>Fecha:</strong> {{ $anuncio->fecha }}</p>
                    <p class="mb-2 text-xl"><strong>Hora:</strong> {{ $anuncio->hora }}</p>
                    <p class="mt-4 text-lg text-gray-700">{{ Str::limit($anuncio->descripcion, 100) }}</p>
                </div>
            </a>

            @endforeach
        </div>

        <!-- Botones de Navegación -->
        <button @click="activeSlide = activeSlide === 0 ? totalSlides - 1 : activeSlide - 1"
                class="absolute left-0 z-10 p-2 text-white -translate-y-1/2 bg-gray-800 rounded-full top-1/2 hover:bg-gray-700">
            &#9664;
        </button>
        <button @click="activeSlide = (activeSlide + 1) % totalSlides"
                class="absolute right-0 z-10 p-2 text-white -translate-y-1/2 bg-gray-800 rounded-full top-1/2 hover:bg-gray-700">
            &#9654;
        </button>

        <!-- Indicadores de Paginación -->
        <div class="absolute flex justify-center w-full gap-2 bottom-4">
            <template x-for="i in Array.from({length: totalSlides}).keys()" :key="i">
                <button @click="activeSlide = i"
                        :class="activeSlide === i ? 'bg-green-700' : 'bg-gray-400'"
                        class="w-3 h-3 rounded-full"></button>
            </template>
        </div>
    </div>

    <!-- Línea Divisoria -->
    <hr class="my-10 border-gray-300">

    <!-- Cuadros de Información con Anuncios dinámicos -->
    <div class="container grid grid-cols-1 gap-8 py-10 mx-auto sm:grid-cols-2 md:grid-cols-3">
        @foreach ($anuncios as $anuncio)
        <a href="{{ route('mas-informacion2', ['id' => $anuncio->id]) }}" class="p-6 transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105 hover:rotate-1">
            <img src="{{ asset($anuncio->afiche) }}" alt="{{ $anuncio->nombre }}" class="object-cover w-full h-48 mb-4 rounded-lg">
            <h3 class="text-xl font-bold">{{ $anuncio->nombre }}</h3>
            <p class="text-gray-600">{{ Str::limit($anuncio->descripcion, 50) }}</p>
            <p class="mt-2 text-sm">Fecha: {{ $anuncio->fecha }} | Hora: {{ $anuncio->hora }}</p>
        </a>

        @endforeach
    </div>






    <script src="//unpkg.com/alpinejs" defer></script>

</x-app-layout>
