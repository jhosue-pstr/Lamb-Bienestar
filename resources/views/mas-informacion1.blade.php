<x-app-layout>
    <div class="full-box page-header">
        <div class="container-fluid">
            <div class="row">
                <!-- Columna 1: Formulario de campos -->
                <div class="col-12 col-md-6">
                    <div class="w-1/2">
                        <div id="event-image-container" class="relative overflow-hidden rounded-lg shadow-lg"
                            style="width: 650px; height: 750px;">
                            <img id="event-image" src="/imagenes/upeu.jpg" alt="Imagen del Evento"
                                class="object-cover w-full h-full rounded-lg">
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-6">

                    <div>
                        <form id="eventForm">
                            <div class="mb-4 form-group">
                                <label for="eventType"
                                    class="bmd-label-floating block text-sm font-medium text-gray-700"
                                    style="font-size: 1.25rem;">Dirigido a:</label>
                                <select id="eventType" name="eventType"
                                    class="form-control block w-full mt-1 rounded-md bg-transparent"
                                    onchange="loadEventOptions()">
                                    <option value="">Seleccione...</option>
                                    <option value="todos">Evento General</option>
                                    <option value="carrera">Evento Escuela</option>
                                </select>
                            </div>

                            <div class="mb-4 form-group">
                                <label for="eventName"
                                    class="bmd-label-floating block text-sm font-medium text-gray-700"
                                    style="font-size: 1.25rem;">Nombre del evento:</label>
                                <select id="eventName" name="eventName"
                                    class="form-control block w-full mt-1 rounded-md bg-transparent" disabled
                                    onchange="fillEventDetails()">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>

                            <div class="mb-4 form-group">
                                <label for="eventLocation"
                                    class="bmd-label-floating block text-sm font-medium text-gray-700"
                                    style="font-size: 1.25rem;">Lugar:</label>
                                <input type="text" id="eventLocation"
                                    class="form-control block w-full mt-1 rounded-md bg-transparent" readonly>
                            </div>

                            <div class="mb-4 form-group">
                                <label for="eventDate"
                                    class="bmd-label-floating block text-sm font-medium text-gray-700"
                                    style="font-size: 1.25rem;">Fecha:</label>
                                <input type="text" id="eventDate"
                                    class="form-control block w-full mt-1 rounded-md bg-transparent" readonly>
                            </div>

                            <div class="mb-4 form-group">
                                <label for="eventTime"
                                    class="bmd-label-floating block text-sm font-medium text-gray-700"
                                    style="font-size: 1.25rem;">Hora:</label>
                                <input type="text" id="eventTime"
                                    class="form-control block w-full mt-1 rounded-md bg-transparent" readonly>
                            </div>

                            <div class="mb-4 form-group">
                                <label for="eventDescription"
                                    class="bmd-label-floating block text-sm font-medium text-gray-700"
                                    style="font-size: 1.25rem;">Descripción:</label>
                                <textarea id="eventDescription" class="form-control block w-full mt-1 rounded-md bg-transparent" rows="3"
                                    readonly></textarea>
                            </div>


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






</x-app-layout>
<script>
    // Función para cargar las opciones de eventos según el tipo seleccionado
    async function loadEventOptions(eventType) {
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
                    eventNameSelect.appendChild(option);
                });

                eventNameSelect.disabled = false; // Habilitar el select después de cargar las opciones
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
                eventImage.src = event.afiche ? `/imagenes/${event.afiche}` : '/imagenes/default.jpeg';
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
                .selectedIndex].text,
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
                mensajes.push(
                    `Recordatorio: \n${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`
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
            const response = await fetch('/api/ultima-cita');
            const cita = await response.json();

            if (cita) {
                mensajes.push(`Próxima cita: \n${cita.nombre}\nFecha: ${cita.fecha}\nHora: ${cita.hora}`);
                colores.push('bg-blue-400'); // Azul para citas
            }
        } catch (error) {
            console.error('Error al obtener la última cita:', error);
        }
    }

    // Función para mostrar los mensajes
    function mostrarMensaje() {
        if (mensajes.length > 0) {
            document.getElementById('mensaje-texto').textContent = mensajes[indiceMensaje];
            document.getElementById('mensaje-mascota').classList.remove(...colores);
            document.getElementById('mensaje-mascota').classList.add(colores[indiceMensaje]);
            indiceMensaje = (indiceMensaje + 1) % mensajes.length; // Ciclo entre mensajes
        }
    }

    // Función para mostrar el mensaje de la mascota
    function mostrarMascota() {
        document.getElementById("mensaje-mascota").classList.remove("hidden");
        setInterval(mostrarMensaje, 5000); // Cambiar mensaje cada 5 segundos
    }

    // Inicializar el proceso
    async function iniciar() {
        await obtenerRecordatorio();
        await obtenerUltimaCita();
        mostrarMascota();
    }

    // Iniciar el proceso cuando cargue la página
    window.onload = iniciar;
</script>
