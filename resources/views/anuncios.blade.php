<x-app-layout>

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











    <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40" style="top: 400px; left: 500px;">
        <!-- Imagen de la mascota -->
        <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="w-50 h-60 animate-move-left">

        <!-- Nube de pensamiento más grande -->
        <div id="mensaje-mascota" class="absolute hidden max-w-[250px] p-2 transform bg-green-400 rounded-lg shadow-lg -translate-x-2/3 -top-1 -left-4">
            <!-- Mensaje de texto más grande -->
            <p id="mensaje-texto" class="text-base font-bold text-black"></p>
            <!-- Triángulo más grande para la nube de pensamiento -->
            <div class="absolute w-0 h-0 border-transparent border-t-5 border-l-5 border-r-5 border-t-green-400 -bottom-2 left-16"></div>
        </div>
    </div>




    <script src="//unpkg.com/alpinejs" defer></script>


    <script>



async function addRecordatorio() {
            const data = {
                tipo: document.getElementById('eventType').value,
                nombre: document.getElementById('eventName').options[document.getElementById('eventName').selectedIndex].text,
                ubicacion: document.getElementById('eventLocation').value,
                fecha: document.getElementById('eventDate').value,
                hora: document.getElementById('eventTime').value,
                descripcion: document.getElementById('eventDescription').value
            };

            try {
                const response = await fetch('/recordatorio', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                if (result.success) {
                    alert('¡Recordatorio añadido correctamente!');
                }
            } catch (error) {
                console.error('Error al guardar el recordatorio:', error);
                alert('Ocurrió un error al guardar el recordatorio.');
            }
        }

        async function obtenerRecordatorio() {
            try {
                const response = await fetch('/api/recordatorio');
                const recordatorio = await response.json();

                if (recordatorio) {
                    const mensajeTexto = `Recordatorio:\n${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`;
                    mostrarMensaje(mensajeTexto);
                }
            } catch (error) {
                console.error('Error al obtener el recordatorio:', error);
            }
        }














        let mensajes = [];
        let colores = []; // Almacena los colores para cada mensaje
        let indiceMensaje = 0; // Índice para alternar entre los mensajes

        // Función para obtener el último recordatorio
        async function obtenerRecordatorio() {
            try {
                const response = await fetch('/api/recordatorio'); // Endpoint para recordatorio
                const recordatorio = await response.json();

                if (recordatorio) {
                    mensajes.push(`Recordatorio:\n${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`);
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
                    mensajes.push(`Cita:\nÁrea: ${cita.area}\nFecha: ${cita.fecha}\nHora: ${cita.hora}`);
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
                mensajeContainer.className = `absolute max-w-[200px] p-1 transform rounded-lg shadow-lg -translate-x-2/3 -top-20 -left-3 ${colores[indiceMensaje]}`;

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



</x-app-layout>
