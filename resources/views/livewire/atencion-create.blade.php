<div>
    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
        <div id="success-message" class="alert alert-success">
            {{ session('message') }}
        </div>

        <!-- Script para hacer desaparecer el mensaje después de unos segundos -->
        <script>
            setTimeout(function() {
                document.getElementById("success-message").style.display = "none";
            }, 5000); // El mensaje se ocultará después de 5 segundos
        </script>
    @endif

    <!-- Formulario de atención -->
    <div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-lg">
        <form wire:submit.prevent="store">
            <!-- Estudiante (Búsqueda por nombre o apellido) -->
            <div class="relative mb-6">
                <label for="estudiante_id" class="block text-sm font-semibold text-gray-700">Estudiante</label>

                <!-- Input de búsqueda de estudiantes -->
                <input
                    type="text"
                    wire:model.live="search"
                    class="block w-full p-3 mt-2 border border-gray-300 rounded-md form-input"
                    placeholder="Buscar historial por nombre... cd"
                />

                <!-- Lista de resultados (solo si hay más de 2 caracteres en la búsqueda y no se ha seleccionado un estudiante) -->
                @if (strlen($search) > 2 && count($estudiantes) > 0 && !$estudiante_id)
                    <ul class="absolute z-10 w-full mt-2 overflow-y-auto bg-white rounded-lg shadow-md max-h-48">
                        @foreach($estudiantes as $estudiante)
                            <li
                                wire:click="selectEstudiante({{ $estudiante->id }})"
                                class="p-2 cursor-pointer hover:bg-gray-100"
                            >
                                {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                            </li>
                        @endforeach
                    </ul>
                @elseif (strlen($search) > 2 && !$estudiante_id)
                    <p class="mt-2 text-sm text-gray-500">No se encontraron resultados.</p>
                @endif

                <!-- Error en caso de no seleccionar estudiante -->
                @error('estudiante_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <!-- Motivo de Atención -->
            <div class="mb-6">
                <label for="motivo" class="block text-sm font-semibold text-gray-700">Motivo de Atención</label>
                <input wire:model="motivo" type="text" id="motivo" class="block w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Motivo de atención">
                @error('motivo') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Tipo -->
            <div class="mb-6">
                <label for="tipo" class="block text-sm font-semibold text-gray-700">Tipo</label>
                <input wire:model="tipo" type="text" id="tipo" class="block w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tipo de atención">
                @error('tipo') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Responsable -->
            <div class="mb-6">
                <label for="resposable" class="block text-sm font-semibold text-gray-700">Responsable</label>
                <input wire:model="resposable" type="text" id="resposable" class="block w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Responsable de la atención">
                @error('resposable') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Fecha de Atención -->
            <div class="mb-6">
                <label for="fecha_atencion" class="block text-sm font-semibold text-gray-700">Fecha de Atención</label>
                <input wire:model="fecha_atencion" type="date" id="fecha_atencion" class="block w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('fecha_atencion') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
            <!-- Descripción del Motivo -->
            <div class="mb-6">
                <label for="descripcion_motivo" class="block text-sm font-semibold text-gray-700">Descripción del Motivo</label>
                <textarea wire:model="descripcion_motivo" id="descripcion_motivo" class="block w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Descripción detallada del motivo de atención"></textarea>
                @error('descripcion_motivo') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Observaciones -->
            <div class="mb-6">
                <label for="observaciones" class="block text-sm font-semibold text-gray-700">Observaciones</label>
                <textarea wire:model="observaciones" id="observaciones" class="block w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Observaciones adicionales"></textarea>
                @error('observaciones') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
            <!-- Otros Datos -->
                <div class="mb-6">
                    <label for="otros_datos" class="block text-sm font-semibold text-gray-700">Otros Datos</label>
                    <textarea wire:model="otros_datos" id="otros_datos" class="block w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Otros datos relevantes"></textarea>
                    @error('otros_datos') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

            <!-- Botón de Guardar Atención -->
            <div class="mb-6 text-center">
                <button type="submit" class="w-full p-3 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Guardar Atención
                </button>
            </div>
        </form>
    </div>
</div>
