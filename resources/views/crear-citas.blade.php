<meta name="csrf-token" content="{{ csrf_token() }}">

<x-app-layout>
    <div class="flex-1">
        <!-- Contenedor Principal -->
        <div class="container px-12 py-10 mx-auto">
            <div class="flex space-x-10">
                <!-- Calendario -->
                <div class="w-1/2">
                    <h3 class="mb-6 text-xl font-bold">Seleccionar Fecha</h3>
                    <div id="calendar" class="p-6 bg-gray-100 rounded-lg shadow"></div>
                    <input type="hidden" id="fecha" name="fecha">
                </div>

                <!-- Formulario -->
                <div class="w-1/2 p-8 bg-white rounded-lg shadow">
                    <h3 class="mb-6 text-xl font-bold">Ingresar datos del estudiante</h3>
                    <form id="form-citas" class="space-y-6">
                        <!-- Buscar estudiante por código -->
                        <div class="flex items-center space-x-6">
                            <div class="w-1/2">
                                <label for="codigo" class="block mb-2 font-medium">Código</label>
                                <input type="text" id="codigo" class="w-full px-3 py-2 border-gray-300 rounded"
                                    placeholder="Ingrese código del estudiante" required>
                            </div>
                            <button type="button" id="buscar"
                                class="h-10 px-6 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                                Buscar
                            </button>
                        </div>

                        <!-- Mostrar información del estudiante -->
                        <div class="flex mt-6 space-x-6">
                            <input type="text" id="nombres" placeholder="Nombres" readonly
                                class="w-1/3 px-3 py-2 bg-gray-100 rounded">
                            <input type="text" id="apellidos" placeholder="Apellidos" readonly
                                class="w-1/3 px-3 py-2 bg-gray-100 rounded">
                            <input type="text" id="facultad" placeholder="Facultad" readonly
                                class="w-1/3 px-3 py-2 bg-gray-100 rounded">
                        </div>

                        <!-- Seleccionar hora -->
                        <div>
                            <label for="hora" class="block mb-2 font-medium">Hora</label>
                            <input type="text" id="hora" class="w-full px-3 py-2 border-gray-300 rounded"
                                placeholder="Seleccione una hora" required>
                        </div>

                        <!-- Seleccionar área -->
                        <div>
                            <label for="area" class="block mb-2 font-medium">Área</label>
                            <select id="area" class="w-full px-3 py-2 border-gray-300 rounded" required>
                                <option value="" disabled selected>Seleccione un área</option>
                                <option value="Psicologia">Psicología</option>
                                <option value="Centro Medico">Centro Médico</option>
                                <option value="Capellania">Capellanía</option>
                                <option value="Atencion Medica">Atención Médica</option>
                                <option value="Sostenibilidad Ambiental">Sostenibilidad Ambiental</option>
                            </select>
                        </div>

                        <!-- Motivo -->
                        <div>
                            <label for="motivo" class="block mb-2 font-medium">Motivo (opcional)</label>
                            <textarea id="motivo" rows="4" class="w-full px-3 py-2 border-gray-300 rounded"
                                placeholder="Ingrese el motivo (opcional)"></textarea>
                        </div>

                        <!-- Botón Agendar -->
                        <div class="mt-8">
                            <button type="button" id="agendar"
                                class="w-full px-6 py-3 text-white bg-green-600 rounded hover:bg-green-700">
                                Agendar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="mascota-container" class="absolute right-0 p-4" style="top: 748px; left: 1080px;">
                <!-- Imagen de la mascota -->
                <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="h-40 w-30 animate-move-left">

                <!-- Nube de pensamiento -->
                <div id="mensaje-mascota"
                    class="hidden max-w-[200px] p-2 transform rounded-lg shadow-lg bg-green-400 -translate-x-2/3 -top-20 -left-3">
                    <!-- Texto del mensaje -->
                    <p id="mensaje-texto" class="text-base font-bold text-black"></p>
                    <!-- Triángulo apuntando a la mascota -->
                    <div
                        class="absolute w-0 h-0 border-transparent border-t-5 border-l-5 border-r-5 border-t-green-400 -bottom-2 left-20">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Librerías y Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script>
        $(document).ready(function() {
            // Configuración del selector de hora
            flatpickr("#hora", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });

            // Configuración del calendario
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                dateClick: function(info) {
                    // Remover estilos de fechas previamente seleccionadas
                    document.querySelectorAll('.fc-day-selected').forEach(day => {
                        day.classList.remove('fc-day-selected');
                    });

                    // Seleccionar la fecha actual y añadir la clase para resaltar
                    const selectedCell = document.querySelector(`[data-date="${info.dateStr}"]`);
                    if (selectedCell) {
                        selectedCell.classList.add('fc-day-selected');
                    }

                    // Actualizar el valor del input oculto
                    $('#fecha').val(info.dateStr);
                },
                events: function(fetchInfo, successCallback, failureCallback) {
                    $.ajax({
                        url: '/crear-citas/obtener-citas',
                        method: 'GET',
                        success: function(data) {
                            const events = data.map(cita => ({
                                title: `Reservado - ${cita.hora}`,
                                start: `${cita.fecha}T${cita.hora}`,
                                color: 'red',
                                extendedProps: {
                                    motivo: cita.motivo,
                                    area: cita.area
                                }
                            }));
                            successCallback(events);
                        },
                        error: function() {
                            failureCallback();
                            alert('Error al cargar las citas.');
                        }
                    });
                }
            });
            calendar.render();

            // Buscar estudiante
            $('#buscar').click(function() {
                const codigo = $('#codigo').val();

                if (!codigo) {
                    alert('Por favor, ingrese un código.');
                    return;
                }

                $.ajax({
                    url: '/crear-citas/buscar-estudiante',
                    method: 'GET',
                    data: {
                        codigo
                    },
                    success: function(data) {
                        $('#nombres').val(data.nombre || '');
                        $('#apellidos').val(data.apellidoPaterno || '');
                        $('#facultad').val(data.facultad || '');
                    },
                    error: function(xhr) {
                        alert('Estudiante no encontrado.');
                    }
                });
            });

            $('#agendar').click(function() {
                const data = {
                    codigo: $('#codigo').val().trim(),
                    area: $('#area').val().trim(),
                    motivo: $('#motivo').val().trim(),
                    fecha: $('#fecha').val().trim(),
                    hora: $('#hora').val().trim(),
                };

                if (!data.codigo || !data.area || !data.fecha || !data.hora) {
                    alert('Por favor, complete todos los campos obligatorios.');
                    return;
                }

                $.ajax({
                    url: '/crear-citas/guardar-cita',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    success: function(response) {
                        alert(response.success || 'Cita agendada correctamente.');
                        location.reload();
                    },
                    error: function(xhr) {
                        const error = xhr.responseJSON?.error || 'Error al agendar la cita.';
                        alert(error);
                    }
                });
            });
        });

        let mensajes = [];
        let colores = [];
        let indiceMensaje = 0;

        async function obtenerUltimoRecordatorio() {
            try {
                const response = await fetch('/api/ultimo-recordatorio');
                if (response.ok) {
                    const recordatorio = await response.json();
                    mensajes.push(`Recordatorio: ${recordatorio.mensaje}`);
                    colores.push(recordatorio.color);
                    mostrarMensaje();
                }
            } catch (error) {
                console.error('Error al obtener el último recordatorio:', error);
            }
        }

        function mostrarMensaje() {
            const mensaje = mensajes[indiceMensaje];
            const color = colores[indiceMensaje];

            $('#mensaje-texto').text(mensaje);
            $('#mensaje-mascota').css('background-color', color);
            $('#mensaje-mascota').removeClass('hidden');
            $('#mascota').addClass('animate-move-left');

            indiceMensaje = (indiceMensaje + 1) % mensajes.length;
        }
    </script>
</x-app-layout>
