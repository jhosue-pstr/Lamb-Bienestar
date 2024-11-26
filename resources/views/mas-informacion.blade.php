<x-app-layout>
    <!-- Contenedor Principal -->
    <div class="flex-1">

        <div class="full-box page-header">
            <div class="container-fluid">
                <div class="row">
                    <!-- Columna 1: Imagen del Evento -->
                    <div class="col-12 col-md-6">
                        <div class="w-1/2">
                            <div id="event-image-container" class="relative overflow-hidden rounded-lg shadow-lg"
                                style="width: 650px; height: 750px;">
                                <img id="event-image" src="{{ asset($evento->afiche ?? 'imagenes/default.jpeg') }}"
                                    alt="Afiche del Evento" class="object-cover w-full h-full rounded-lg">
                            </div>
                        </div>
                    </div>

                    <!-- Columna 2: Formulario del Evento -->
                    <div class="col-12 col-md-6">
                        <div class=>
                            <form id="eventForm">
                                <!-- Dirigido a: -->
                                <div class="mb-4 form-group">
                                    <label for="eventType"
                                        class="bmd-label-floating block text-sm font-medium text-gray-700"
                                        style="font-size: 1.25rem;">Dirigido a:</label>
                                    <select id="eventType" name="eventType"
                                        class="form-control block w-full mt-1 rounded-md" onchange="loadEventOptions()">
                                        <option value="">Seleccione...</option>
                                        <option value="todos" {{ $evento->tipo == 'todos' ? 'selected' : '' }}>
                                            Evento General
                                        </option>
                                        <option value="carrera" {{ $evento->tipo == 'carrera' ? 'selected' : '' }}>
                                            Evento Escuela
                                        </option>
                                    </select>
                                </div>

                                <!-- Nombre del Evento: -->
                                <div class="mb-4 form-group">
                                    <label for="eventName"
                                        class="bmd-label-floating block text-sm font-medium text-gray-700"
                                        style="font-size: 1.25rem;">Nombre del evento:</label>
                                    <select id="eventName" name="eventName" data-selected="{{ $evento->id ?? '' }}"
                                        class="form-control block w-full mt-1 rounded-md" disabled
                                        onchange="fillEventDetails()">
                                        <option value="">Seleccione...</option>
                                    </select>
                                </div>

                                <!-- Lugar: -->
                                <!-- Lugar: -->
                                <div class="mb-4 form-group">
                                    <label for="eventLocation"
                                        class="bmd-label-floating block text-sm font-medium text-gray-700"
                                        style="font-size: 1.25rem;">Lugar:</label>
                                    <input type="text" id="eventLocation"
                                        class="form-control block w-full mt-1 rounded-md bg-transparent"
                                        value="{{ $evento->ubicacion ?? '' }}" readonly>
                                </div>


                                <!-- Fecha: -->
                                <div class="mb-4 form-group">
                                    <label for="eventDate"
                                        class="bmd-label-floating block text-sm font-medium text-gray-700"
                                        style="font-size: 1.25rem;">Fecha:</label>
                                    <input type="text" id="eventDate"
                                        class="form-control block w-full mt-1rounded-md  bg-transparent"
                                        value="{{ $evento->fecha ?? '' }}" readonly>
                                </div>

                                <!-- Hora: -->
                                <div class="mb-4 form-group">
                                    <label for="eventTime"
                                        class="bmd-label-floating block text-sm font-medium text-gray-700"
                                        style="font-size: 1.25rem;">Hora:</label>
                                    <input type="text" id="eventTime"
                                        class="form-control block w-full mt-1 rounded-md  bg-transparent"
                                        value="{{ $evento->hora ?? '' }}" readonly>
                                </div>

                                <!-- Descripción: -->
                                <div class="mb-4 form-group">
                                    <label for="eventDescription"
                                        class="bmd-label-floating block text-sm font-medium text-gray-700"
                                        style="font-size: 1.25rem;">Descripción:</label>
                                    <textarea id="eventDescription" class="form-control block w-full mt-10 rounded-md  bg-transparent" rows="3"
                                        readonly>{{ $evento->descripcion ?? '' }}</textarea>
                                </div>

                                <!-- Botón para añadir recordatorio -->
                                <div class="text-left">
                                    <button type="button" onclick="addRecordatorio()"
                                        class="px-10 py-4 text-lg font-bold text-white bg-green-700 rounded-md hover:bg-green-500">
                                        Añadir Recordatorio
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40"
            style="top: 669px; left: 1600px;">
            <!-- Imagen de la mascota -->
            <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="w-50 h-60 animate-move-left">

            <!-- Nube de pensamiento más grande -->
            <div id="mensaje-mascota"
                class="absolute hidden max-w-[350px] p-2 transform bg-green-400 rounded-lg shadow-lg -translate-x-2/3 -top-10 -left-4">
                <!-- Mensaje de texto más grande -->
                <p id="mensaje-texto" class="text-lg font-bold text-black"></p>
                <!-- Triángulo más grande para la nube de pensamiento -->
                <div
                    class="absolute w-0 h-0 border-transparent border-t-10 border-l-10 border-r-10 border-t-green-400 -bottom-2 left-16">
                </div>
            </div>
        </div>












        <script src="{{ asset('js/scripts.js') }}"></script>







        <script>
            window.onload = async function() {
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
                        eventImage.src = event.afiche ? `{{ asset('${event.afiche}') }}?t=${new Date().getTime()}` :
                            '/imagenes/default.jpeg';
                    } catch (error) {
                        console.error('Error al llenar los detalles del evento:', error);
                    }
                }
            }

            // Evento al cambiar el tipo de evento
            document.getElementById('eventType').addEventListener('change', async function() {
                const eventType = this.value;
                await loadEventOptions(eventType); // Cargar las opciones según el tipo seleccionado
            });

            // Evento al cambiar el nombre del evento
            document.getElementById('eventName').addEventListener('change', async function() {
                const eventId = this.value;
                await fillEventDetails(eventId); // Llenar los detalles del evento seleccionado
            });




















            // Función para agregar un recordatorio
            async function addRecordatorio() {
                const data = {
                    tipo: document.getElementById('eventType').value,
                    nombre: document.getElementById('eventName').options[document.getElementById('eventName')
                        .selectedIndex]?.text || '',
                    ubicacion: document.getElementById('eventLocation').value,
                    fecha: document.getElementById('eventDate').value,
                    hora: document.getElementById('eventTime').value,
                    descripcion: document.getElementById('eventDescription').value
                };
                if (!data.tipo || !data.nombre || !data.ubicacion || !data.fecha || !data.hora) {
                    alert('Por favor, completa todos los campos antes de enviar.');
                    return;
                }
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
                        mensajes.push(
                            `Recordatorio:\n${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`
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
                    mensajeContainer.className =
                        `absolute max-w-[200px] p-1 transform rounded-lg shadow-lg -translate-x-2/3 -top-20 -left-3 ${colores[indiceMensaje]}`;

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
