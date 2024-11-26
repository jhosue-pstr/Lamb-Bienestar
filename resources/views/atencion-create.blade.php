<div>
    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Formulario de atención -->
    <div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-lg">
        <form wire:submit.prevent="store">
            <!-- Estudiante -->
            <div class="relative">
                <!-- Campo de búsqueda -->
                <input type="text" wire:model.debounce.500ms="search"
                    class="block w-full p-3 mt-2 border border-gray-300 rounded-md form-input"
                    placeholder="Buscar historial por nombre...">

                <!-- Resultados de búsqueda -->
                @if (strlen($search) > 2)
                    @if ($estudiantes->isNotEmpty())
                        <ul class="absolute z-10 w-full mt-2 overflow-y-auto bg-white rounded-lg shadow-md max-h-48">
                            @foreach ($estudiantes as $estudiante)
                                <li wire:click="selectEstudiante({{ $estudiante->id }})"
                                    class="p-2 cursor-pointer hover:bg-gray-100">
                                    {{ $estudiante->nombre }} {{ $estudiante->apellidoPaterno }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-2 text-sm text-gray-500">No se encontraron resultados.</p>
                    @endif
                @endif
            </div>

            <!-- Motivo de Atención (Requerido) -->
            <div class="mb-6">
                <label for="motivo" class="block text-sm font-semibold text-gray-700">Motivo de Atención</label>
                <input wire:model="motivo" type="text" id="motivo"
                    class="block w-full p-3 mt-2 border border-gray-300 rounded-md" placeholder="Motivo de atención"
                    required>
                @error('motivo')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tipo (Requerido) -->
            <div class="mb-6">
                <label for="tipo" class="block text-sm font-semibold text-gray-700">Tipo</label>
                <input wire:model="tipo" type="text" id="tipo"
                    class="block w-full p-3 mt-2 border border-gray-300 rounded-md" placeholder="Tipo de atención"
                    required>
                @error('tipo')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Responsable (Requerido) -->
            <div class="mb-6">
                <label for="responsable" class="block text-sm font-semibold text-gray-700">Responsable</label>
                <input wire:model="responsable" type="text" id="responsable"
                    class="block w-full p-3 mt-2 border border-gray-300 rounded-md"
                    placeholder="Responsable de la atención" required>
                @error('responsable')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Fecha de Atención (Requerido) -->
            <div class="mb-6">
                <label for="fecha_atencion" class="block text-sm font-semibold text-gray-700">Fecha de Atención</label>
                <input wire:model="fecha_atencion" type="date" id="fecha_atencion"
                    class="block w-full p-3 mt-2 border border-gray-300 rounded-md" required>
                @error('fecha_atencion')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <!-- Descripción Motivo (Opcional) -->
            <div class="mb-6">
                <label for="descripcion_motivo" class="block text-sm font-semibold text-gray-700">Descripción del
                    Motivo</label>
                <textarea wire:model="descripcion_motivo" id="descripcion_motivo"
                    class="block w-full p-3 mt-2 border border-gray-300 rounded-md" placeholder="Descripción del motivo de la atención"></textarea>
                @error('descripcion_motivo')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Otros Datos (Opcional) -->
            <div class="mb-6">
                <label for="otros_datos" class="block text-sm font-semibold text-gray-700">Otros Datos</label>
                <textarea wire:model="otros_datos" id="otros_datos" class="block w-full p-3 mt-2 border border-gray-300 rounded-md"
                    placeholder="Otros datos relacionados con la atención"></textarea>
                @error('otros_datos')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                Registrar Atención
            </button>
        </form>

    </div>
</div>
