<meta name="csrf-token" content="{{ csrf_token() }}">

<x-app-layout>
    <div class="flex-1">
        <!-- Contenedor Principal -->
        <div class="container px-12 py-10 mx-auto">
            <div class="flex space-x-10">
                <!-- Calendario -->
                <div class="w-1/2">
                    <h3 class="mb-6 text-xl font-bold text-green-500">Seleccionar Fecha</h3>
                    <div id="calendar" class="p-6 bg-transparent bg-gray-100 rounded-lg shadow"></div>
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
                                    <div class="mb-3 col-6">
                                        <div class="form-group">
                                            <label for="codigo" class="bmd-label-floating">Código</label>
                                            <input type="text" name="codigo" id="codigo" class="form-control"
                                                required>
                                        </div>

                                    </div>
                                    <button type="button" id="buscar" class="btn btn-primary btn-sm">
                                        Buscar estudiante
                                    </button>

                                    <div class="mb-3 col-12">
                                        <div class="form-group">
                                            <label for="nombres" class="font-bold text-green-500 bmd-label-floating">Nombres</label>
                                            <input type="text" id="nombres" class="bg-transparent form-control"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidos" class="bmd-label-floating">Apellidos</label>
                                            <input type="text" id="apellidos" class="bg-transparent form-control"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="facultad" class="bmd-label-floating">Facultad</label>
                                            <input type="text" id="facultad" class="bg-transparent form-control"
                                                readonly>
                                        </div>
                                    </div>

                                    <!-- Hora -->
                                    <div class="mb-3 col-12">
                                        <div class="form-group">
                                            <label for="hora" class="bmd-label-floating">Hora</label>
                                            <input type="text" name="hora" id="hora"
                                                class="bg-transparent form-control"
                                                placeholder="Ingrese la hora de la cita" required>
                                        </div>
                                    </div>

                                    <!-- Área -->
                                    <div class="mb-3 col-12">
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
                                    <div class="mb-3 col-12">
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


            <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40"
            style="top: 750px; left: 700px;">
            <!-- Imagen de la mascota -->
            <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="h-40 w-45 animate-move-left"   style="with:80px ;height:170px;">


            <!-- Nube de pensamiento más grande -->
            <div id="mensaje-mascota"
                class="absolute hidden bg-green-400 rounded-lg shadow-lg"
                style="z-index: 9999; top: -100px; left: 10px; width: 210px; padding: 10px;">
                <!-- Mensaje de texto -->
                <p id="mensaje-texto" class="text-xl font-bold text-black">¡Hola, soy tu asistente!</p>
                <!-- Triángulo para la nube -->
                <div
                    class="absolute w-0 h-0 border-transparent border-t-[15px] border-l-[15px] border-r-[15px] border-t-green-400"
                    style="bottom: -15px; left: 50%; transform: translateX(-50%);">
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
                mensajes.push(`Cita:\nÁrea: ${cita.area}\nFecha: ${cita.fecha}\nHora: ${cita.hora}`);
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

<style>
    .selected-date {
        background-color: #f87171 !important;
        color: white !important;
    }

</style>
</x-app-layout>
