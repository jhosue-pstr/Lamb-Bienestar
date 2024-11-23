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

    <div class="mt-2 text-center" style="margin-left: 40px; position: relative; z-index: 10;">
        <button onclick="window.location.href='/mas-informacion1'"
                class="px-8 py-4 text-xl font-bold text-white bg-green-700 rounded-lg hover:bg-green-800">
            Más Información
        </button>
    </div>


</div>









            <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40" style="top: 747px; left: 1080px;">
                <!-- Imagen de la mascota -->
                <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="h-40 w-30 animate-move-left">

                <!-- Nube de pensamiento más grande -->
                <div id="mensaje-mascota" class="absolute hidden max-w-[200px] p-1 transform rounded-lg shadow-lg -translate-x-2/3 -top-20 -left-3 bg-green-400" style="z-index: 9999;">
                    <!-- Mensaje de texto -->
                    <p id="mensaje-texto" class="text-base font-bold text-black"></p>
                    <!-- Triángulo para la nube -->
                    <div class="absolute w-0 h-0 border-transparent border-t-5 border-l-5 border-r-5 border-t-green-400 -bottom-2 left-20"></div>
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

                    // Mostrar la nube
                    mensajeContainer.classList.remove('hidden');

                    // Animaciones de la mascota
                    mascota.classList.add('animate-pulse');
                    mensajeContainer.classList.add('animate-bounce');

                    // Ocultar el mensaje después de 8 segundos
                    setTimeout(() => {
                        mensajeContainer.classList.add('hidden');
                        mascota.classList.remove('animate-pulse');
                        mensajeContainer.classList.remove('animate-bounce');

                        // Cambiar al siguiente mensaje
                        indiceMensaje = (indiceMensaje + 1) % mensajes.length;
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
                    // Mostrar el primer mensaje y configurar el intervalo
                    mostrarMensaje();
                    setInterval(() => {
                        mostrarMensaje();
                    }, 8000); // Cambiar mensaje cada 8 segundos
                } else {
                    console.warn('No hay mensajes para mostrar.');
                }
            }

            // Llamar al ciclo cuando la página se cargue
            document.addEventListener('DOMContentLoaded', iniciarCicloMensajes);



    </script>

</x-app-layout>
