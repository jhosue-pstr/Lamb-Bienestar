{{-- resources/views/mas-informacion1.blade.php --}}
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

                <div class="text-center">
                    <button type="button" onclick="addRecordatorio()" class="px-6 py-2 text-white bg-green-700 rounded-md hover:bg-green-500">
                        Añadir Recordatorio
                    </button>
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

            mascota.classList.add('animate-pulse');
            mensajeContainer.classList.add('animate-bounce');

            setTimeout(() => {
                mensajeContainer.classList.add('hidden');
                mascota.classList.remove('animate-pulse');
                mensajeContainer.classList.remove('animate-bounce');
            }, 5000);
        }

        setInterval(obtenerRecordatorio, 5000);
    </script>

</x-app-layout>
