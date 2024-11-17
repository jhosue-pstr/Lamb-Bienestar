<x-app-layout>
    <div class="flex-1">
        <!-- Barra Superior -->
        <header class="py-1 bg-green-700">
            <div class="flex items-center pl-4 max-w-7xl">
                <img src="{{ asset('imagenes/logo1.png') }}" alt="LAMB University" class="w-auto h-16 mr-2">
            </div>
        </header>

        <!-- Contenedor Principal -->
        <div class="container px-12 py-10 mx-auto">
            <div class="flex space-x-10">
                <!-- Calendario a la izquierda -->
                <div class="w-1/2">
                    <h3 class="mb-6 text-xl font-bold">Seleccionar Fecha</h3>
                    <div id="calendar" class="p-6 bg-gray-100 rounded-lg shadow"></div>
                    <input type="hidden" id="fecha" name="fecha">
                </div>

                <!-- Formulario a la derecha -->
                <div class="w-1/2 p-8 bg-white rounded-lg shadow">
                    <h3 class="mb-6 text-xl font-bold">Ingresar datos del estudiante</h3>

                    <form id="form-citas" class="space-y-6">
                        <!-- Buscar estudiante por código -->
                        <div class="flex items-center space-x-6">
                            <div class="w-1/2">
                                <label for="codigo" class="block mb-2 font-medium">Código</label>
                                <input type="text" id="codigo" class="w-full px-3 py-2 border-gray-300 rounded">
                            </div>
                            <button type="button" id="buscar" class="h-10 px-6 py-2 mt-6 text-white bg-blue-600 rounded hover:bg-blue-700">Buscar</button>
                        </div>

                        <!-- Mostrar información del estudiante -->
                        <div class="flex mt-6 space-x-6">
                            <input type="text" id="nombres" placeholder="Nombres" readonly class="w-1/3 px-3 py-2 bg-gray-100 rounded">
                            <input type="text" id="apellidos" placeholder="Apellidos" readonly class="w-1/3 px-3 py-2 bg-gray-100 rounded">
                            <input type="text" id="facultad" placeholder="Facultad" readonly class="w-1/3 px-3 py-2 bg-gray-100 rounded">
                        </div>

                        <!-- Seleccionar hora -->
                        <div>
                            <label for="hora" class="block mb-2 font-medium">Hora</label>
                            <input type="text" id="hora" class="w-full px-3 py-2 border-gray-300 rounded">
                        </div>

                        <!-- Seleccionar área -->
                        <div>
                            <label for="area" class="block mb-2 font-medium">Área</label>
                            <select id="area" class="w-full px-3 py-2 border-gray-300 rounded">
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
                            <textarea id="motivo" rows="4" class="w-full px-3 py-2 border-gray-300 rounded"></textarea>
                        </div>

                        <!-- Botón Agendar -->
                        <div class="mt-8">
                            <button type="button" id="agendar" class="w-full px-6 py-3 text-white bg-green-600 rounded hover:bg-green-700">Agendar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Librerías de FullCalendar y jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script>
        $(document).ready(function () {
            flatpickr("#hora", { enableTime: true, noCalendar: true, dateFormat: "H:i", time_24hr: true });

            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                dateClick: function (info) {
                    // Remover la selección previa
                    document.querySelectorAll('.selected-date').forEach(element => {
                        element.classList.remove('selected-date');
                    });

                    // Marcar la fecha actual seleccionada
                    const selectedCell = document.querySelector(`td[data-date="${info.dateStr}"]`);
                    if (selectedCell) {
                        selectedCell.classList.add('selected-date');
                    }

                    // Actualizar el campo oculto con la fecha seleccionada
                    $('#fecha').val(info.dateStr);
                },
                events: function (fetchInfo, successCallback) {
                    $.get('/crear-citas/obtener-citas', function (data) {
                        const events = data.map(cita => ({
                            title: `Reservado - ${cita.hora}`,
                            start: `${cita.fecha}T${cita.hora}`,
                            color: 'red',
                            extendedProps: {
                                motivo: cita.motivo,
                                area: cita.area,
                                hora: cita.hora
                            }
                        }));
                        successCallback(events);
                    });
                },
                eventDidMount: function (info) {
                    $(info.el).tooltip({
                        title: `Área: ${info.event.extendedProps.area}, Hora: ${info.event.extendedProps.hora}, Motivo: ${info.event.extendedProps.motivo}`,
                        placement: 'top',
                        trigger: 'hover'
                    });
                }
            });

            calendar.render();

            // Buscar estudiante
            $('#buscar').click(function () {
                const codigo = $('#codigo').val();
                if (!codigo) {
                    alert('Por favor, ingrese un código');
                    return;
                }
                $.get('/crear-citas/buscar-estudiante', { codigo }, function (data) {
                    $('#nombres').val(data.nombres);
                    $('#apellidos').val(data.apellidos);
                    $('#facultad').val(data.facultad);
                }).fail(function () {
                    alert('Estudiante no encontrado');
                });
            });

            // Guardar cita
            $('#agendar').click(function () {
                const data = {
                    codigo: $('#codigo').val(),
                    area: $('#area').val(),
                    motivo: $('#motivo').val(),
                    fecha: $('#fecha').val(),
                    hora: $('#hora').val(),
                    _token: "{{ csrf_token() }}"
                };

                if (!data.codigo || !data.area || !data.fecha || !data.hora) {
                    alert('Por favor, complete todos los campos obligatorios');
                    return;
                }

                $.post('/crear-citas/guardar-cita', data, function (response) {
                    alert(response.success);
                    calendar.refetchEvents();
                }).fail(function (xhr) {
                    alert(xhr.responseJSON.error || 'Error al agendar la cita');
                });
            });
        });
    </script>

    <style>
        .selected-date {
            background-color: #f87171 !important;
            color: white !important;
        }
    </style>


</x-app-layout>
