<x-app-layout>
    <div class="flex-1">


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



    <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40" style="top: 747px; left: 1080px;">
        <!-- Imagen de la mascota -->
        <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="h-40 w-30 animate-move-left">

        <!-- Nube de pensamiento más grande -->
        <div id="mensaje-mascota" class="absolute hidden max-w-[200px] p-1 transform rounded-lg shadow-lg -translate-x-2/3 -top-20 -left-3 bg-green-400" style="z-index: 9999;">
            <!-- Mensaje de texto -->
            <p id="mensaje-texto" class="text-base font-bold text-black"></p>
            <!-- Triángulo para la nube -->
            <div class="absolute w-0 h-0 border-transparent border-t-5 border-l-5 border-r-5 border-t-green-400 -bottom-2 left-20"></div>
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









    <style>
        .selected-date {
            background-color: #f87171 !important;
            color: white !important;
        }










    /* Ajustamos el contenedor de la nube para que esté siempre encima */
    #mensaje-mascota {
        z-index: 1000; /* Un z-index alto para que esté sobre cualquier otro elemento */
        position: absolute; /* Asegura que funcione el z-index */
    }

    /* Ajustamos el calendario para que no interfiera con la nube */
    #calendar {
        z-index: 0; /* Un z-index bajo para que esté por debajo de la nube */
        position: relative; /* Evita que el calendario interfiera con el stacking context */
    }

    </style>


</x-app-layout>
