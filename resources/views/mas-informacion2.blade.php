<x-app-layout>


    <!-- Formulario de anuncio -->
    <!-- Formulario de anuncio -->
    <div class="full-box page-header">
        <div class="container-fluid">
            <form action="" class="form-neon" autocomplete="off">
                <fieldset>
                    <legend><i class="far fa-address-card"></i> &nbsp; Información de Eventos</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Columna 1: Formulario de campos -->
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="eventName" class="bmd-label-floating">Nombre del anuncio</label>
                                    <select id="eventName" name="eventName" class="form-control"
                                        onchange="fillEventDetails()">
                                        <option value="{{ $anuncio->id }}" selected>{{ $anuncio->nombre }}</option>
                                        @foreach ($anuncios as $otherAnuncio)
                                            @if ($anuncio->id !== $otherAnuncio->id)
                                                <option value="{{ $otherAnuncio->id }}">{{ $otherAnuncio->nombre }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="eventLocation" class="bmd-label-floating">Lugar</label>
                                    <input type="text" id="eventLocation" name="eventLocation"
                                        value="{{ $anuncio->ubicacion }}" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="eventDate" class="bmd-label-floating">Fecha</label>
                                    <input type="text" id="eventDate" name="eventDate" value="{{ $anuncio->fecha }}"
                                        class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="eventTime" class="bmd-label-floating">Hora</label>
                                    <input type="text" id="eventTime" name="eventTime" value="{{ $anuncio->hora }}"
                                        class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="eventDescription" class="bmd-label-floating">Descripción</label>
                                    <input type="text" id="eventDescription" name="eventDescription"
                                        value="{{ $anuncio->descripcion }}" class="form-control" readonly>
                                </div>
                            </div>

                            <!-- Columna 2: Imagen -->
                            <div class="col-12 col-md-6">
                                <div id="event-image-container" class="relative overflow-hidden rounded-lg shadow-lg"
                                    style="width: 100%; height: 750px;">
                                    <img id="event-image" src="{{ asset($anuncio->afiche) }}" alt="Imagen del Anuncio"
                                        class="object-cover w-full h-full rounded-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>





    <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40"
        style="top: 669px; left: 1530px;">
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

</x-app-layout>





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
