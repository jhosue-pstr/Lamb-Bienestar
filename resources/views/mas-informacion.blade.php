<x-app-layout>
    <!-- Contenedor Principal -->
    <div class="flex-1">
        <!-- Barra Verde Superior con Logotipo -->
        <header class="py-1 bg-green-700">
            <div class="flex items-center pl-4 max-w-7xl">
                <img src="{{ asset('imagenes/logo1.png') }}" alt="LAMB University" class="w-auto h-16 mr-2">
            </div>
        </header>
    </div>

    <div class="container flex px-8 py-8 space-x-8">
        <!-- Imagen dinámica del evento -->
        <div class="w-1/2">
            <div id="event-image-container" class="relative overflow-hidden rounded-lg shadow-lg" style="width: 650px; height: 750px;">
                <img id="event-image" src="{{ asset($evento->afiche ?? 'imagenes/default.jpeg') }}" alt="Afiche del Evento" class="object-cover w-full h-full rounded-lg">
            </div>
        </div>

        <!-- Formulario de evento -->
        <div class="w-[700px] h-[750px] bg-white rounded-lg shadow-lg p-6 overflow-y-auto">
            <form id="eventForm">
                <!-- Selección de 'Dirigido a:' -->
                <div class="mb-4">
                    <label for="eventType" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Dirigido a:</label>
                    <select id="eventType" name="eventType" class="block w-full mt-1 border-gray-300 rounded-md" onchange="loadEventOptions()">
                        <option value="">Seleccione...</option>
                        <option value="todos" {{ $evento->tipo == 'todos' ? 'selected' : '' }}>Evento General</option>
                        <option value="carrera" {{ $evento->tipo == 'carrera' ? 'selected' : '' }}>Evento Escuela</option>
                    </select>
                </div>

                <!-- Selección de 'Nombre del evento' -->
                <!-- Selección de 'Nombre del evento' -->
                <div class="mb-4">
                    <label for="eventName" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Nombre del evento:</label>
                    <select id="eventName" name="eventName" data-selected="{{ $evento->id ?? '' }}" class="block w-full mt-1 border-gray-300 rounded-md" disabled onchange="fillEventDetails()">
                        <option value="">Seleccione...</option>
                    </select>
                </div>


                <!-- Campos de detalle -->
                <div class="mb-4">
                    <label for="eventLocation" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Lugar:</label>
                    <input type="text" id="eventLocation" class="block w-full mt-1 border-gray-300 rounded-md" value="{{ $evento->ubicacion ?? '' }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="eventDate" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Fecha:</label>
                    <input type="text" id="eventDate" class="block w-full mt-1 border-gray-300 rounded-md" value="{{ $evento->fecha ?? '' }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="eventTime" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Hora:</label>
                    <input type="text" id="eventTime" class="block w-full mt-1 border-gray-300 rounded-md" value="{{ $evento->hora ?? '' }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="eventDescription" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Descripción:</label>
                    <textarea id="eventDescription" class="block w-full mt-1 border-gray-300 rounded-md" rows="3" readonly>{{ $evento->descripcion ?? '' }}</textarea>
                </div>

                <div class="text-center">
                    <button type="button" onclick="addRecordatorio()" class="px-6 py-2 text-white bg-green-700 rounded-md hover:bg-green-500">
                        Añadir Recordatorio
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mascota -->
    <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-20" style="bottom: -35px;">
        <img src="/imagenes/mascota.png" alt="Mascota" id="mascota" class="w-48 h-48 animate-move-left">
        <div id="mensaje-mascota" class="absolute hidden p-3 transform -translate-x-full bg-green-400 rounded-lg shadow-lg -top-10 -left-12">
            <p id="mensaje-texto" class="text-sm font-bold text-black"></p>
            <div class="absolute w-0 h-0 border-t-8 border-l-8 border-r-8 border-transparent border-t-green-400 -bottom-2 left-8"></div>
        </div>
    </div>




    <script src="{{ asset('js/scripts.js') }}"></script>







    <script>



window.onload = async function () {
    const eventType = document.getElementById('eventType').value;
    const selectedEventId = document.getElementById('eventName').dataset.selected;

    if (eventType) {
        await loadEventOptions(eventType, selectedEventId); // Cargar las opciones al inicio
    }
};

// Función para cargar las opciones de eventos según el tipo seleccionado
async function loadEventOptions(eventType, selectedEventId = null) {
    const eventNameSelect = document.getElementById('eventName');
    eventNameSelect.innerHTML = '<option value="">Seleccione...</option>'; // Limpiar opciones
    eventNameSelect.disabled = true; // Deshabilitar mientras se cargan opciones

    if (eventType) {
        try {
            const response = await fetch(`/api/eventos?tipo=${eventType}`);
            if (!response.ok) throw new Error("Error al cargar las opciones de eventos");

            const eventsData = await response.json();

            // Crear las opciones del select
            eventsData.forEach(event => {
                const option = document.createElement("option");
                option.value = event.id;
                option.textContent = event.nombre;

                // Preseleccionar si coincide con el ID seleccionado
                if (selectedEventId && event.id.toString() === selectedEventId) {
                    option.selected = true;
                }

                eventNameSelect.appendChild(option);
            });

            eventNameSelect.disabled = false; // Habilitar el select después de cargar las opciones

            // Llenar detalles si hay un evento preseleccionado
            if (selectedEventId) {
                await fillEventDetails(selectedEventId);
            }
        } catch (error) {
            console.error('Error al cargar las opciones de eventos:', error);
        }
    }
}

// Función para llenar los detalles del evento seleccionado
async function fillEventDetails(eventId) {
    if (eventId) {
        try {
            const response = await fetch(`/api/evento/${eventId}`);
            const event = await response.json();

            document.getElementById("eventLocation").value = event.ubicacion || '';
            document.getElementById("eventDate").value = event.fecha || '';
            document.getElementById("eventTime").value = event.hora || '';
            document.getElementById("eventDescription").value = event.descripcion || '';

            // Actualizar la imagen
            const eventImage = document.getElementById("event-image");
            eventImage.src = event.afiche ? `{{ asset('${event.afiche}') }}?t=${new Date().getTime()}` : '/imagenes/default.jpeg';
        } catch (error) {
            console.error('Error al llenar los detalles del evento:', error);
        }
    }
}

// Evento al cambiar el tipo de evento
document.getElementById('eventType').addEventListener('change', async function () {
    const eventType = this.value;
    await loadEventOptions(eventType); // Cargar las opciones según el tipo seleccionado
});

// Evento al cambiar el nombre del evento
document.getElementById('eventName').addEventListener('change', async function () {
    const eventId = this.value;
    await fillEventDetails(eventId); // Llenar los detalles del evento seleccionado
});




















// Función para agregar un recordatorio
async function addRecordatorio() {
    const data = {
        tipo: document.getElementById('eventType').value,
        nombre: document.getElementById('eventName').options[document.getElementById('eventName').selectedIndex]?.text || '',
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

// Función para obtener un recordatorio y mostrarlo en la mascota
async function obtenerRecordatorio() {
    try {
        const response = await fetch('/api/recordatorio');
        const recordatorio = await response.json();

        if (recordatorio && recordatorio.nombre) {
            const mensajeTexto = `Recordatorio:\n${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`;
            mostrarMensaje(mensajeTexto);
        } else {
            console.warn('No hay recordatorios disponibles.');
        }
    } catch (error) {
        console.error('Error al obtener el recordatorio:', error);
    }
}

// Función para mostrar un mensaje en la mascota
function mostrarMensaje(mensaje) {
    const mensajeContainer = document.getElementById('mensaje-mascota');
    const mensajeTexto = document.getElementById('mensaje-texto');
    const mascota = document.getElementById('mascota');

    mensajeTexto.textContent = mensaje;
    mensajeContainer.classList.remove('hidden');
    mascota.classList.add('animate-pulse');
    mensajeContainer.classList.add('animate-bounce');

    setTimeout(() => {
        mensajeContainer.classList.add('hidden');
        mascota.classList.remove('animate-pulse');
        mensajeContainer.classList.remove('animate-bounce');
    }, 5000);
}

// Configurar intervalos para obtener recordatorios cada 5 segundos
setInterval(obtenerRecordatorio, 5000);


    </script>



























    </x-app-layout>
