{{-- resources/views/mas-informacion1.blade.php --}}
<x-app-layout>
    <!-- Contenedor Principal -->


    <div class="container flex px-8 py-8 space-x-8">
        <!-- Imagen dinámica que se actualizará -->
        <div class="w-1/2">
            <div id="event-image-container" class="relative overflow-hidden rounded-lg shadow-lg" style="width: 650px; height: 750px;">
                <img id="event-image" src="/imagenes/upeu.jpg" alt="Imagen del Evento" class="object-cover w-full h-full rounded-lg">
            </div>
        </div>

        <!-- Formulario de evento -->
        <div class="w-[700px] h-[750px] bg-white rounded-lg shadow-lg p-6 overflow-y-auto">
            <form id="eventForm">
                <div class="mb-4">
                    <label for="eventType" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Dirigido a:</label>
                    <select id="eventType" name="eventType" class="block w-full mt-1 border-gray-300 rounded-md" onchange="loadEventOptions()">
                        <option value="">Seleccione...</option>
                        <option value="todos">Evento General</option>
                        <option value="carrera">Evento Escuela</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="eventName" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Nombre del evento:</label>
                    <select id="eventName" name="eventName" class="block w-full mt-1 border-gray-300 rounded-md" disabled onchange="fillEventDetails()">
                        <option value="">Seleccione...</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="eventLocation" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Lugar:</label>
                    <input type="text" id="eventLocation" class="block w-full mt-1 border-gray-300 rounded-md" readonly>
                </div>

                <div class="mb-4">
                    <label for="eventDate" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Fecha:</label>
                    <input type="text" id="eventDate" class="block w-full mt-1 border-gray-300 rounded-md" readonly>
                </div>

                <div class="mb-4">
                    <label for="eventTime" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Hora:</label>
                    <input type="text" id="eventTime" class="block w-full mt-1 border-gray-300 rounded-md" readonly>
                </div>

                <div class="mb-4">
                    <label for="eventDescription" class="block text-sm font-medium text-gray-700" style="font-size: 1.25rem;">Descripción:</label>
                    <textarea id="eventDescription" class="block w-full mt-1 border-gray-300 rounded-md" rows="3" readonly></textarea>
                </div>

                <div class="text-left">
                    <button
                        type="button"
                        onclick="addRecordatorio()"
                        class="px-10 py-4 text-lg font-bold text-white bg-green-700 rounded-md hover:bg-green-500">
                        Añadir Recordatorio
                    </button>
                </div>

            </form>
        </div>
    </div>











        <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40" style="top: 669px; left: 1600px;">
            <!-- Imagen de la mascota -->
            <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="w-50 h-60 animate-move-left">

            <!-- Nube de pensamiento más grande -->
            <div id="mensaje-mascota" class="absolute hidden max-w-[350px] p-2 transform bg-green-400 rounded-lg shadow-lg -translate-x-2/3 -top-10 -left-4">
                <!-- Mensaje de texto más grande -->
                <p id="mensaje-texto" class="text-lg font-bold text-black"></p>
                <!-- Triángulo más grande para la nube de pensamiento -->
                <div class="absolute w-0 h-0 border-transparent border-t-10 border-l-10 border-r-10 border-t-green-400 -bottom-2 left-16"></div>
            </div>
        </div>





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
                const response = await fetch(`/api/evento/${eventId}`);
                const event = await response.json();

                document.getElementById("eventLocation").value = event.ubicacion || '';
                document.getElementById("eventDate").value = event.fecha || '';
                document.getElementById("eventTime").value = event.hora || '';
                document.getElementById("eventDescription").value = event.descripcion || '';

                const eventImage = document.getElementById("event-image");
                eventImage.src = event.afiche ? event.afiche : '/imagenes/default.jpeg';
            }
        }















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
