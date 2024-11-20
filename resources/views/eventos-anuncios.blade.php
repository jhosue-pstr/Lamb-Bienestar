<x-app-layout>
    <div class="container flex px-4 py-8 gap-x-20">
        <!-- Contenedor principal con fondo y altura fija -->
        <div class="relative w-1/2 p-6 rounded-lg" style="height: 800px; overflow-y: auto; background-image: url('imagenes/camino.jpg'); background-size: cover; background-position: center; background-color: rgba(255, 255, 255, 0.5); background-blend-mode: overlay;">
            <div class="flex flex-col items-start">
            <!-- Botones de navegación -->
            <div class="flex mb-8 ml-6 space-x-6" style="margin-left: 60px">
                <button onclick="mostrarRuta('ruta-general')"
                        class="flex items-center justify-center px-12 py-4 text-base text-white bg-green-700 rounded"
                        style="width: 250px; font-size: 1.5rem; font-weight: bold; height: 70px; line-height: 1;">
                    <b>Eventos General</b>
                </button>
                <button onclick="mostrarRuta('ruta-escuela')"
                        class="flex items-center justify-center px-12 py-4 text-base text-white bg-green-700 rounded"
                        style="width: 250px; font-size: 1.5rem; font-weight: bold; height: 70px; line-height: 1;">
                    <b>Eventos Escuela</b>
                </button>
            </div>

            <!-- Botón Anuncios alineado a la derecha -->
            <div class="flex justify-end mt-0 mb-6" style="margin-left: 200px">
                <button onclick="window.location.href='/anuncios'"
                        class="flex items-center justify-center px-16 py-4 text-base text-white bg-green-700 rounded"
                        style="width: 250px; font-size: 1.5rem; font-weight: bold; height: 70px; line-height: 1;">
                    <b>Anuncios</b>
                </button>
            </div>



                <!-- Contenedor para la línea gris y eventos -->
                <div class="relative w-full mt-6">
                    <!-- Línea gris centrada dentro del contenedor -->
                    <div class="absolute h-full transform -translate-x-1/2 border-l-4 border-gray-300 left-1/2" style="height: 105%"></div>

                    <!-- Eventos General -->
                    <div id="ruta-general" style="display: block;">
                        <div class="mt-6 space-y-4">
                            @foreach($eventosGenerales as $index => $evento)
                                <div class="flex items-center mb-6">
                                    @if($index % 2 == 0)
                                        <!-- Contenedor del cuadro blanco a la izquierda -->
                                        <a href="{{ url('/mas-informacion', ['id' => $evento->id]) }}" class="w-5/12 p-4 ml-4 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100" style="margin-right: 30px; text-decoration: none;">
                                            <h3 class="text-lg font-bold text-gray-800">{{ $evento->fecha }}</h3>
                                            <p class="text-gray-600">{{ $evento->nombre }}</p>
                                        </a>
                                        <!-- Contenedor de la bolita verde -->
                                        <a href="{{ url('/mas-informacion', ['id' => $evento->id]) }}" class="relative w-2 text-center">
                                            <div class="absolute w-6 h-6 bg-green-700 border border-white rounded-full" style="left: 90%; top: 50%; transform: translate(-50%, -50%);"></div>
                                        </a>
                                        <div class="w-5/12"></div> <!-- Espacio vacío a la derecha -->
                                    @else
                                        <div class="w-5/12"></div> <!-- Espacio vacío a la izquierda -->
                                        <!-- Contenedor de la bolita verde -->
                                        <a href="{{ url('/mas-informacion', ['id' => $evento->id]) }}" class="relative w-2 text-center">
                                            <div class="absolute w-6 h-6 bg-green-700 border border-white rounded-full" style="left: 650%; top: 50%; transform: translate(-50%, -50%);"></div>
                                        </a>
                                        <!-- Contenedor del cuadro blanco a la derecha -->
                                        <a href="{{ url('/mas-informacion', ['id' => $evento->id]) }}" class="w-5/12 p-4 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100" style="margin-left: 80px; text-decoration: none;">
                                            <h3 class="text-lg font-bold text-gray-800">{{ $evento->fecha }}</h3>
                                            <p class="text-gray-600">{{ $evento->nombre }}</p>
                                        </a>




                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Eventos Escuela -->
                    <div id="ruta-escuela" style="display: none;">
                        <div class="mt-6 space-y-4">
                            @foreach($eventosEscuela as $index => $evento)
                                <div class="flex items-center mb-6">
                                    @if($index % 2 == 0)
                                        <!-- Contenedor del cuadro blanco a la izquierda -->
                                        <a href="{{ route('mas-informacion', ['id' => $evento->id]) }}" class="w-5/12 p-4 ml-4 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100" style="margin-right: 30px; text-decoration: none;">
                                            <h3 class="text-lg font-bold text-gray-800">{{ $evento->fecha }}</h3>
                                            <p class="text-gray-600">{{ $evento->nombre }}</p>
                                        </a>
                                        <!-- Contenedor de la bolita verde -->
                                        <a href="{{ url('/mas-informacion', ['id' => $evento->id]) }}" class="relative w-2 text-center">
                                            <div class="absolute w-6 h-6 bg-green-700 border border-white rounded-full" style="left: 90%; top: 50%; transform: translate(-50%, -50%);"></div>
                                        </a>
                                        <div class="w-5/12"></div> <!-- Espacio vacío a la derecha -->
                                    @else
                                        <div class="w-5/12"></div> <!-- Espacio vacío a la izquierda -->
                                        <!-- Contenedor de la bolita verde -->
                                        <a href="{{ url('/mas-informacion', ['id' => $evento->id]) }}" class="relative w-2 text-center">
                                            <div class="absolute w-6 h-6 bg-green-700 border border-white rounded-full" style="left: 650%; top: 50%; transform: translate(-50%, -50%);"></div>
                                        </a>
                                        <!-- Contenedor del cuadro blanco a la derecha -->
                                        <a href="{{ route('mas-informacion', ['id' => $evento->id]) }}" class="w-5/12 p-4 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100" style="margin-left: 70px; text-decoration: none;">
                                            <h3 class="text-lg font-bold text-gray-800">{{ $evento->fecha }}</h3>
                                            <p class="text-gray-600">{{ $evento->nombre }}</p>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Carrusel -->
<div class="w-1/2">
    <div id="carouselExample" class="relative overflow-hidden rounded-lg shadow-lg" style="height: 800px;">
        <div class="relative h-full transition-transform duration-500 ease-in-out carousel-content">
            @foreach($eventosGenerales as $index => $evento)
                <div class="carousel-item {{ $index === 0 ? 'active' : 'hidden' }}" style="transform: translateX({{ 100 * $index }}%); height: 100%;">
                    <img src="{{ asset($evento->afiche) }}" alt="Evento {{ $evento->nombre }}" class="object-cover w-full h-full">
                </div>
            @endforeach
        </div>
        <button onclick="prevSlide()" class="absolute left-0 px-4 py-2 text-2xl text-white transform -translate-y-1/2 bg-gray-700 bg-opacity-75 rounded-full top-1/2 hover:bg-opacity-100">&lt;</button>
        <button onclick="nextSlide()" class="absolute right-0 px-4 py-2 text-2xl text-white transform -translate-y-1/2 bg-gray-700 bg-opacity-75 rounded-full top-1/2 hover:bg-opacity-100">&gt;</button>
    </div>

    <div class="mt-4 text-center" style="margin-left: 10px;">
        <button onclick="window.location.href='/mas-informacion1'" class="px-6 py-3 text-lg text-white bg-green-700 rounded-lg">Más Información</button>
    </div>
</div>





    <script>
        function mostrarRuta(tipo) {
            const rutaGeneral = document.getElementById('ruta-general');
            const rutaEscuela = document.getElementById('ruta-escuela');

            if (tipo === 'ruta-general') {
                rutaGeneral.style.display = 'block';
                rutaEscuela.style.display = 'none';
            } else {
                rutaGeneral.style.display = 'none';
                rutaEscuela.style.display = 'block';
            }
        }

        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('hidden', i !== index);
                slide.style.transform = `translateX(${100 * (i - index)}%)`;
            });
            currentSlide = index;
        }

        function nextSlide() {
            showSlide((currentSlide + 1) % totalSlides);
        }

        function prevSlide() {
            showSlide((currentSlide - 1 + totalSlides) % totalSlides);
        }

        setInterval(nextSlide, 5000);
        showSlide(currentSlide);
    </script>
</x-app-layout>
