<meta name="csrf-token" content="{{ csrf_token() }}">

<x-app-layout>
    <div class="flex-1">
        <!-- Contenedor Principal -->
        <div class="container px-12 py-10 mx-auto">
            <div class="flex space-x-10">
                <!-- Calendario -->
                <div class="w-1/2">
                    <h3 class="mb-6 text-xl font-bold">Seleccionar Fecha</h3>
                    <div id="calendar" class="p-6 bg-gray-100 rounded-lg shadow bg-transparent"></div>
                    <input type="hidden" id="fecha" name="fecha">
                </div>

                <!-- Formulario -->
                <div class="container-fluid col-5">
                    <form>
                        @csrf <!-- Protección CSRF -->
                        <fieldset>
                            <legend><i class="far fa-address-card"></i> &nbsp; Información de la cita</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- Buscar estudiante por código -->
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="codigo" class="bmd-label-floating">Código</label>
                                            <input type="text" name="codigo" id="codigo" class="form-control"
                                                required>
                                        </div>

                                    </div>
                                    <button type="button" id="buscar" class="btn btn-primary btn-sm">
                                        Buscar estudiante
                                    </button>

                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="nombres" class="bmd-label-floating">Nombres</label>
                                            <input type="text" id="nombres" class="form-control bg-transparent"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidos" class="bmd-label-floating">Apellidos</label>
                                            <input type="text" id="apellidos" class="form-control bg-transparent"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="facultad" class="bmd-label-floating">Facultad</label>
                                            <input type="text" id="facultad" class="form-control bg-transparent"
                                                readonly>
                                        </div>
                                    </div>

                                    <!-- Hora -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="hora" class="bmd-label-floating">Hora</label>
                                            <input type="text" name="hora" id="hora"
                                                class="form-control bg-transparent"
                                                placeholder="Ingrese la hora de la cita" required>
                                        </div>
                                    </div>

                                    <!-- Área -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="area" class="bmd-label-floating">Área</label>
                                            <select name="area" id="area" class="form-control" required>
                                                <option value="" disabled selected>Seleccione un área</option>
                                                <option value="Psicologia">Psicología</option>
                                                <option value="Centro Medico">Centro Médico</option>
                                                <option value="Capellania">Capellanía</option>
                                                <option value="Atencion Medica">Atención Médica</option>
                                                <option value="Sostenibilidad Ambiental">Sostenibilidad Ambiental
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Motivo -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="motivo" class="bmd-label-floating">Motivo (opcional)</label>
                                            <textarea name="motivo" id="motivo" class="form-control" placeholder="Ingrese el motivo (opcional)"></textarea>
                                        </div>
                                    </div>

                                    <!-- Botón Agendar -->
                                    <div class="mt-8">
                                        <button type="button" id="agendar"
                                            class="w-full px-6 py-3 text-white bg-green-600 rounded hover:bg-green-700">
                                            Agendar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>

            <!-- Mascota -->
            <div id="mascota-container" class="absolute right-0 p-4" style="top: 748px; left: 1080px;">
                <!-- Imagen de la mascota -->
                <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="h-40 w-30 animate-move-left">

                <!-- Nube de pensamiento -->
                <div id="mensaje-mascota"
                    class="hidden max-w-[200px] p-2 transform rounded-lg shadow-lg bg-green-400 -translate-x-2/3 -top-20 -left-3">
                    <p id="mensaje-texto" class="text-base font-bold text-black"></p>
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
                time_24hr: true,
            });

            // Configuración del calendario
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                dateClick: function(info) {
                    document.querySelectorAll('.fc-day-selected').forEach(day => {
                        day.classList.remove('fc-day-selected');
                    });

                    const selectedCell = document.querySelector(`[data-date="${info.dateStr}"]`);
                    if (selectedCell) {
                        selectedCell.classList.add('fc-day-selected');
                    }

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
                    error: function() {
                        alert('Estudiante no encontrado.');
                    }
                });
            });

            // Agendar cita
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
                    error: function() {
                        alert('Error al agendar la cita.');
                    },
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
                    mensajes.push(
                        `Recordatorio:\nNombre: ${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`
                    );
                    colores.push('bg-green-400');
                }
            } catch (error) {
                console.error('Error al obtener el último recordatorio:', error);
            }
        }

        async function obtenerUltimaCita() {
            try {
                const response = await fetch('/api/ultima-cita');
                if (response.ok) {
                    const cita = await response.json();
                    mensajes.push(`Última cita:\nÁrea: ${cita.area}\nFecha: ${cita.fecha}\nHora: ${cita.hora}`);
                    colores.push('bg-blue-400');
                }
            } catch (error) {
                console.error('Error al obtener la última cita:', error);
            }
        }

        async function mostrarMensajesMascota() {
            await obtenerUltimoRecordatorio();
            await obtenerUltimaCita();
            if (mensajes.length > 0) {
                setInterval(() => {
                    $('#mensaje-texto').text(mensajes[indiceMensaje]);
                    $('#mensaje-mascota').removeClass('hidden').addClass(colores[indiceMensaje]);
                    setTimeout(() => $('#mensaje-mascota').addClass('hidden'), 3000);
                    indiceMensaje = (indiceMensaje + 1) % mensajes.length;
                }, 5000);
            }
        }

        mostrarMensajesMascota();
    </script>
</x-app-layout>
