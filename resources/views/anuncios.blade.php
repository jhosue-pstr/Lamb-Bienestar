<x-app-layout>
    <div class="container py-6 mx-auto">
        <!-- Carrusel de anuncios -->
        <div x-data="{ activeSlide: 0, totalSlides: {{ count($anuncios) }}, interval: null }" x-init="interval = setInterval(() => activeSlide = (activeSlide + 1) % totalSlides, 10000)"
            class="relative max-w-5xl mx-auto overflow-hidden carousel-container">

            <div class="relative flex transition-transform duration-700 carousel-slides"
                :style="'transform: translateX(-' + activeSlide * 100 + '%)'"
                style="width: {{ count($anuncios) * 100 }}%;">
                @foreach ($anuncios as $index => $anuncio)
                    <a href="{{ route('mas-informacion2', ['id' => $anuncio->id]) }}"
                        class="flex items-center justify-center flex-shrink-0 w-full p-6 carousel-slide">
                        <div class="w-1/2">
                            <img src="{{ asset($anuncio->afiche) }}" alt="Afiche del anuncio"
                                class="h-48 rounded-lg shadow-lg carousel-image">
                            <!-- Ajuste en la altura de la imagen -->
                        </div>
                        <div class="w-1/2 p-8 carousel-text">
                            <h2 class="mb-4 text-3xl font-bold text-green-500">{{ $anuncio->nombre }}</h2>
                            <p class="mb-2 text-xl text-green-500"><strong>Fecha:</strong> {{ $anuncio->fecha }}</p>
                            <p class="mb-2 text-xl text-green-500"><strong>Hora:</strong> {{ $anuncio->hora }}</p>
                            <p class="mt-4 text-lg text-gray-700">{{ Str::limit($anuncio->descripcion, 100) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Botones de flechas -->
            <button @click="activeSlide = (activeSlide - 1 + totalSlides) % totalSlides"
                class="absolute z-10 flex items-center justify-center w-10 h-10 text-green-500 -translate-y-1/2 bg-white border-2 border-green-500 rounded-full shadow-md top-1/2 left-4 hover:bg-green-500 hover:text-white">
                &#9664;
            </button>
            <button @click="activeSlide = (activeSlide + 1) % totalSlides"
                class="absolute z-10 flex items-center justify-center w-10 h-10 text-green-500 -translate-y-1/2 bg-white border-2 border-green-500 rounded-full shadow-md top-1/2 right-4 hover:bg-green-500 hover:text-white">
                &#9654;
            </button>

            <div class="carousel-pagination">
                <template x-for="i in Array.from({length: totalSlides}).keys()" :key="i">
                    <button @click="activeSlide = i" :class="activeSlide === i ? 'active' : ''"
                        class="carousel-pagination-button"></button>
                </template>
            </div>
        </div>

        <!-- Cuadros de anuncios -->
        <div class="grid grid-cols-1 gap-6 full-box tile-container sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
            @foreach ($anuncios as $anuncio)
                <a href="{{ route('mas-informacion2', ['id' => $anuncio->id]) }}"
                    class="p-4 bg-white rounded-lg shadow-lg tile hover:shadow-xl">
                    <div class="mb-4 text-lg font-bold text-center text-green-500 tile-tittle">
                        {{ $anuncio->nombre }}
                    </div>
                    <div class="tile-icon">
                        <img src="{{ asset($anuncio->afiche) }}" alt="{{ $anuncio->nombre }}"
                            class="object-cover w-full h-40 mb-4 rounded-lg tile-img">
                        <p class="mb-2 font-bold text-center text-green-500">
                            {{ Str::limit($anuncio->descripcion, 40) }}</p>
                        <p class="font-bold text-center text-green-500">Fecha: {{ $anuncio->fecha }} | Hora:
                            {{ $anuncio->hora }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>










    <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40" style="top: 380px; left: 200px;">
        <!-- Imagen de la mascota -->
        <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="h-40 w-45 animate-move-left"
            style="with:100px ;height:200px;">


        <!-- Nube de pensamiento más grande -->
        <div id="mensaje-mascota" class="absolute hidden bg-green-400 rounded-lg shadow-lg"
            style="z-index: 9999; top: -70px; left: -10px; width: 240px; padding: 20px;">
            <!-- Mensaje de texto -->
            <p id="mensaje-texto" class="text-xl font-bold text-black">¡Hola, soy tu asistente!</p>
            <!-- Triángulo para la nube -->
            <div class="absolute w-0 h-0 border-transparent border-t-[15px] border-l-[15px] border-r-[15px] border-t-green-400"
                style="bottom: -15px; left: 50%; transform: translateX(-50%);">
            </div>
        </div>
    </div>





</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
    .carousel-container {
        width: 1200px;
        overflow: hidden;
        margin-top: -10px;
        /* Carrusel más arriba */
        height: 600px;
    }

    .carousel-slides {
        display: flex;
        transition: transform 0.7s ease-in-out;
    }

    .carousel-slide {
        flex-shrink: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel-image {
        object-fit: cover;
        width: 100%;
        max-width: 100%;
        height: 100%;
        /* Ajuste automático de la altura */
    }

    .carousel-text {
        padding: 1rem;
        background-color: #f8f8f8;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .carousel-pagination {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
    }

    .carousel-pagination-button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: gray;
    }

    .carousel-pagination-button.active {
        background-color: green;
    }

    .tile-container {
        margin-top: 20px;
    }

    .tile {
        transition: transform 0.3s, box-shadow 0.3s;
        height: 420px;
        /* Altura de los cuadros */
        width: 320px;
        /* Ancho de los cuadros */
    }

    .tile:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .tile-tittle {
        font-size: 1rem;
        /* Tamaño del texto */
    }

    .tile-img {
        border-radius: 8px;
    }
</style>

<script>
    let mensajes = [];
    let colores = []; // Almacena los colores para cada mensaje
    let indiceMensaje = 0; // Índice para alternar entre losw mensajes

    // Función para obtener el último recordatorio
    async function obtenerRecordatorio() {
        try {
            const response = await fetch('/api/recordatorio'); // Endpoint para recordatorio
            const recordatorio = await response.json();

            if (recordatorio) {
                mensajes.push(
                    Recordatorio: \n$ {
                        recordatorio.nombre
                    }\
                    nFecha: $ {
                        recordatorio.fecha
                    }\
                    nHora: $ {
                        recordatorio.hora
                    }
                );
                colores.push('bg-green-400'); // Verde para recordatorios
            }
        } catch (error) {
            console.error('Error al obtener el recordatorio:', error);
        }
    }

    // Función para obtener la última cita
    async function obtenerUltimaCita() {
        try {
            const response = await fetch('/api/ultima-cita'); // Endpoint para cita
            const cita = await response.json();

            if (cita) {
                mensajes.push(Cita: \nÁrea: $ {
                        cita.area
                    }\
                    nFecha: $ {
                        cita.fecha
                    }\
                    nHora: $ {
                        cita.hora
                    });
                colores.push('bg-blue-400'); // Celeste para citas
            }
        } catch (error) {
            console.error('Error al obtener la última cita:', error);
        }
    }

    // Función para mostrar mensajes en la mascota
    function mostrarMensaje() {
        const mensajeContainer = document.getElementById('mensaje-mascota');
        const mensajeTexto = document.getElementById('mensaje-texto');
        const mascota = document.getElementById('mascota');

        if (mensajes.length > 0) {
            // Mostrar el mensaje actual
            mensajeTexto.textContent = mensajes[indiceMensaje];

            // Cambiar el color de fondo de la nube según el tipo de mensaje
            mensajeContainer.className =
                absolute max - w - [200 px] p - 1 transform rounded - lg shadow - lg - translate - x - 2 / 3 - top -
                20 - left - 3 $ {
                    colores[indiceMensaje]
                };

            // Mostrar la nube (asegúrate de que nunca se oculte)
            mensajeContainer.classList.remove('hidden');

            // Animaciones de la mascota
            mascota.classList.add('animate-pulse');
            mensajeContainer.classList.add('animate-bounce');

            // Cambiar al siguiente mensaje sin ocultar la nube
            setTimeout(() => {
                indiceMensaje = (indiceMensaje + 1) % mensajes.length;
                mostrarMensaje(); // Mostrar el siguiente mensaje
            }, 8000); // Cambiar la duración aquí
        }
    }

    // Función para gestionar los mensajes en un ciclo infinito
    async function iniciarCicloMensajes() {
        // Obtener datos de recordatorio y cita
        await obtenerRecordatorio();
        await obtenerUltimaCita();

        // Validar si hay mensajes para mostrar
        if (mensajes.length > 0) {
            // Mostrar el primer mensaje
            mostrarMensaje();
        } else {
            console.warn('No hay mensajes para mostrar.');
        }
    }

    // Llamar al ciclo cuando la página se cargue
    document.addEventListener('DOMContentLoaded', iniciarCicloMensajes);
</script>
