{{-- resources/views/crear-citas.blade.php --}}
<x-app-layout>
    <div class="flex-1">
        <header class="py-1 bg-green-700">
            <div class="flex items-center pl-4 max-w-7xl">
                <img src="{{ asset('imagenes/logo1.png') }}" alt="LAMB University" class="w-auto h-16 mr-2">
            </div>
        </header>

        <!-- Formulario para Crear Citas -->
        <div class="container px-8 py-8 mx-auto">
            <div class="p-6 mx-auto bg-white rounded-lg shadow max-w-7xl">
                <h3 class="mb-4 text-lg font-bold">Ingresar datos del estudiante</h3>

                <form id="form-citas" class="space-y-4">
                    <!-- Buscar estudiante por código -->
                    <div class="flex items-center space-x-4">
                        <div>
                            <label for="codigo" class="block font-medium text-gray-700">Código</label>
                            <input type="text" id="codigo" class="w-full border-gray-300 rounded" placeholder="Ingrese el código">
                        </div>
                        <button type="button" id="buscar" class="px-4 py-2 text-white bg-blue-600 rounded">Buscar</button>
                    </div>

                    <!-- Mostrar información del estudiante -->
                    <div class="flex mt-4 space-x-4">
                        <input type="text" id="nombres" class="w-1/3 bg-gray-100 rounded" placeholder="Nombres" readonly>
                        <input type="text" id="apellidos" class="w-1/3 bg-gray-100 rounded" placeholder="Apellidos" readonly>
                        <input type="text" id="facultad" class="w-1/3 bg-gray-100 rounded" placeholder="Facultad" readonly>
                    </div>

                    <!-- Seleccionar fecha y hora -->
                    <div class="space-y-4">
                        <label for="fecha" class="block font-medium text-gray-700">Fecha</label>
                        <input type="text" id="fecha" class="w-full border-gray-300 rounded" placeholder="Seleccione una fecha">

                        <label for="hora" class="block font-medium text-gray-700">Hora</label>
                        <input type="text" id="hora" class="w-full border-gray-300 rounded" placeholder="Seleccione la hora">

                        <label for="area" class="block font-medium text-gray-700">Área</label>
                        <select id="area" class="w-full border-gray-300 rounded">
                            <option value="" disabled selected>Seleccione un área</option>
                            <option value="Psicologia">Psicología</option>
                            <option value="Centro Medico">Centro Médico</option>
                            <option value="Capellania">Capellanía</option>
                            <option value="Atencion Medica">Atención Médica</option>
                            <option value="Sostenibilidad Ambiental">Sostenibilidad Ambiental</option>
                        </select>

                        <label for="motivo" class="block font-medium text-gray-700">Motivo (opcional)</label>
                        <textarea id="motivo" rows="4" class="w-full border-gray-300 rounded"></textarea>
                    </div>

                    <!-- Botón Agendar -->
                    <button type="button" id="agendar" class="w-full px-6 py-2 mt-4 text-white bg-green-600 rounded">Agendar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Librerías de Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Agregar FullCalendar y jQuery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            // Inicializar Flatpickr para fecha
            flatpickr("#fecha", {
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr) {
                    $('#fecha').val(dateStr);
                }
            });

            // Inicializar Flatpickr para hora
            flatpickr("#hora", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });

            // Buscar estudiante por código
            $('#buscar').click(function() {
                const codigo = $('#codigo').val();
                $.get('/crear-citas/buscar-estudiante', { codigo }, function(data) {
                    $('#nombres').val(data.nombres);
                    $('#apellidos').val(data.apellidos);
                    $('#facultad').val(data.facultad);
                }).fail(function() {
                    alert('Estudiante no encontrado');
                });
            });

            // Guardar cita
            $('#agendar').click(function() {
                const data = {
                    codigo: $('#codigo').val(),
                    area: $('#area').val(),
                    motivo: $('#motivo').val(),
                    fecha: $('#fecha').val(),
                    hora: $('#hora').val(),
                    _token: "{{ csrf_token() }}"
                };

                if (!data.fecha || !data.hora || !data.codigo || !data.area) {
                    alert('Por favor, complete todos los campos obligatorios.');
                    return;
                }

                console.log('Datos a enviar:', data);

                $.post('/crear-citas/guardar-cita', data, function(response) {
                    alert(response.success);
                    $('#fecha').val('');
                    $('#hora').val('');
                    $('#motivo').val('');
                }).fail(function(xhr) {
                    alert(xhr.responseJSON.error || 'Error al agendar la cita');
                });
            });
        });
    </script>
</x-app-layout>
