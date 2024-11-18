
{{-- resources/views/mas-informacion.blade.php --}}
<x-app-layout>
    <!-- Contenedor Principal -->
    <div class="flex-1">
        <!-- Barra Verde Superior con Logotipo y Texto Ajustado a la Izquierda -->
        @if (request()->is('mas-informacion2'))
            <header class="py-1 bg-green-700">
                <div class="flex items-center pl-4 max-w-7xl">
                    <img src="{{ asset('imagenes/logo1.png') }}" alt="LAMB University" class="w-auto h-16 mr-2">
                </div>
            </header>
        @endif

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
    </div>

    <div class="container flex px-8 py-8 space-x-8" style="margin-left: 50px;">
        <!-- Imagen dinámica que se actualizará -->
        <div class="w-1/2">
            <div id="event-image-container" class="relative overflow-hidden rounded-lg shadow-lg" style="width: 650px; height: 750px;">
                <img id="event-image" src="/imagenes/upeu.jpg" alt="Imagen del Anuncio" class="object-cover w-full h-full rounded-lg">
            </div>
        </div>

        <!-- Formulario de anuncio -->
        <div class="w-[700px] h-[750px] bg-white rounded-lg shadow-lg p-6 overflow-y-auto">
            <form id="eventForm">
                <div class="mb-4">
                    <label for="eventName" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem; margin-top: 50px;">Nombre del anuncio:</label>
                    <select id="eventName" name="eventName" class="block w-full mt-1 border-gray-300 rounded-md" onchange="fillEventDetails()">
                        <option value="">Seleccione...</option>
                        @foreach ($anuncios as $anuncio)
                            <option value="{{ $anuncio->id }}">{{ $anuncio->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="eventLocation" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Lugar:</label>
                    <input type="text" id="eventLocation" class="block w-full mt-1 border-gray-300 rounded-md" readonly>
                </div>

                <div class="mb-4">
                    <label for="eventDate" class="block text-sm font-medium text-gray-700"style="font-size: 1.25rem;">Fecha:</label>
                    <input type="text" id="eventDate" class="block w-full mt-1 border-gray-300 rounded-md" readonly>
                </div>

                <div class="mb-2">
                    <label for="eventTime" class="block text-sm font-medium text-gray-700"style="font-size: 1.25rem;">Hora:</label>
                    <input type="text" id="eventTime" class="block w-full mt-1 border-gray-300 rounded-md" readonly>
                </div>

                <div class="mb-2">
                    <label for="eventDescription" class="block text-sm font-medium text-gray-700"style="font-size: 1.25rem;">Descripción:</label>
                    <textarea id="eventDescription" class="block w-full mt-1 border-gray-300 rounded-md" rows="3" readonly></textarea>
                </div>
            </form>
        </div>
    </div>

    <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-20" style="bottom: -35px;">
        <!-- Imagen de la mascota -->
        <img src="/imagenes/mascota.png" alt="Mascota" id="mascota" class="w-48 h-48 animate-move-left">

        <!-- Nube de pensamiento al lado izquierdo -->
        <div id="mensaje-mascota" class="absolute hidden p-3 transform -translate-x-full bg-green-400 rounded-lg shadow-lg -top-10 -left-12">
            <!-- Mensaje de texto -->
            <p id="mensaje-texto" class="text-sm font-bold text-black"></p>
            <!-- Triángulo para la nube de pensamiento -->
            <div class="absolute w-0 h-0 border-t-8 border-l-8 border-r-8 border-transparent border-t-green-400 -bottom-2 left-8"></div>
        </div>
    </div>







    <script>
async function loadEventOptions() {
            const eventType = document.getElementById("eventType").value;
            const eventNameSelect = document.getElementById("eventName");
            eventNameSelect.innerHTML = '<option value="">Seleccione...</option>';
            eventNameSelect.disabled = true;

            if (eventType) {
                const response = await fetch(`/api/eventos/${eventType}`);
                const eventsData = await response.json();
                if (eventsData.length > 0) {
                    eventsData.forEach(event => {
                        const option = document.createElement("option");
                        option.value = event.id;
                        option.textContent = event.nombre;
                        eventNameSelect.appendChild(option);
                    });
                    eventNameSelect.disabled = false;
                }
            }
        }



async function fillEventDetails() {
    const eventId = document.getElementById("eventName").value;
    if (eventId) {
        try {
            // Llamada a la nueva API para obtener los detalles del anuncio
            const response = await fetch(`/api/anuncio-json/${eventId}`);

            if (!response.ok) {
                throw new Error("Error en la respuesta de la API");
            }

            const anuncio = await response.json();

            // Autocompletar los campos
            document.getElementById("eventLocation").value = anuncio.ubicacion || '';
            document.getElementById("eventDate").value = anuncio.fecha || '';
            document.getElementById("eventTime").value = anuncio.hora || '';
            document.getElementById("eventDescription").value = anuncio.descripcion || '';

            // Cambiar la imagen del afiche usando la URL completa desde la base de datos
            const eventImage = document.getElementById("event-image");
            eventImage.src = anuncio.afiche ? `/${anuncio.afiche}` : '/imagenes/default.jpeg';
        } catch (error) {
            console.error("Error al cargar los detalles del anuncio:", error);
        }
    }
}






















    let intervalId;
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

    function mostrarMensaje(mensaje) {
        const mensajeContainer = document.getElementById('mensaje-mascota');
        const mensajeTexto = document.getElementById('mensaje-texto');
        const mascota = document.getElementById('mascota');

        mensajeTexto.textContent = mensaje;
        mensajeContainer.classList.remove('hidden');

        // Añadir animación a la mascota
        mascota.classList.add('animate-pulse');
        mensajeContainer.classList.add('animate-bounce');

        // Quitar la animación y ocultar el mensaje después de 5 segundos
        setTimeout(() => {
            mensajeContainer.classList.add('hidden');
            mascota.classList.remove('animate-pulse');
            mensajeContainer.classList.remove('animate-bounce');
        }, 10000);
    }

    // Inicia el intervalo para obtener recordatorios cada 10 segundos
    setInterval(obtenerRecordatorio, 10000);





document.addEventListener("DOMContentLoaded", async () => {
    // Obtener el ID del anuncio de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const anuncioId = urlParams.get('id');

    if (anuncioId) {
        await cargarDatosAnuncio(anuncioId);
    }
});

async function cargarDatosAnuncio(id) {
    try {
        const response = await fetch(`/api/anuncio-json/${id}`);
        if (!response.ok) {
            throw new Error("Error al obtener los datos del anuncio");
        }

        const anuncio = await response.json();

        // Autocompletar los campos del formulario
        const eventNameSelect = document.getElementById("eventName");

        // Establecer el valor seleccionado en el select
        eventNameSelect.value = anuncio.id;

        document.getElementById("eventLocation").value = anuncio.ubicacion || '';
        document.getElementById("eventDate").value = anuncio.fecha || '';
        document.getElementById("eventTime").value = anuncio.hora || '';
        document.getElementById("eventDescription").value = anuncio.descripcion || '';

        const eventImage = document.getElementById("event-image");
        eventImage.src = anuncio.afiche ? `/${anuncio.afiche}` : '/imagenes/default.jpeg';
    } catch (error) {
        console.error("Error al cargar los detalles del anuncio:", error);
    }
}
















    </script>






















    </script>


















    </x-app-layout>
