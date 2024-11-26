<div class="container-fluid">
    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Formulario de atención -->
    <form wire:submit.prevent="store" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp;Registrar atención</legend>
            <div class="container-fluid">
                <div class="row">
                    <!-- Buscar Estudiante -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="estudiante" class="bmd-label-floating">Buscar Estudiante</label>
                            <input wire:model="search" type="text" id="estudiante" class="form-control">
                            <!-- Resultados de la búsqueda -->
                            @if ($search && count($estudiantes))
                                <ul
                                    class="absolute z-10 w-full mt-2 overflow-y-auto bg-white border border-gray-300 rounded-md shadow-lg max-h-60">
                                    @foreach ($estudiantes as $estudiante)
                                        <li wire:click="selectEstudiante({{ $estudiante->id }})"
                                            class="px-4 py-2 cursor-pointer hover:bg-gray-200">
                                            {{ $estudiante->nombre }} {{ $estudiante->apellidoPaterno }}
                                            {{ $estudiante->apellidoMaterno }}
                                        </li>
                                    @endforeach
                                </ul>
                            @elseif($search)
                                <ul
                                    class="absolute z-10 w-full mt-2 bg-white border border-gray-300 rounded-md shadow-lg">
                                    <li class="px-4 py-2 text-gray-500">No se encontraron estudiantes.</li>
                                </ul>
                            @endif
                            <!-- Mostrar Estudiante Seleccionado -->
                            @if ($selectedEstudiante)
                                <div class="mt-2 text-sm text-gray-600">
                                    <span>Estudiante seleccionado:</span>
                                    {{ $selectedEstudiante->nombre }} {{ $selectedEstudiante->apellidoPaterno }}
                                    {{ $selectedEstudiante->apellidoMaterno }}
                                </div>
                            @else
                                <div class="mt-2 text-sm text-gray-600">
                                    <span>No hay estudiante seleccionado.</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Motivo de Atención (Requerido) -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="motivo" class="bmd-label-floating">Motivo de Atención</label>
                            <input wire:model="motivo" type="text" id="motivo" class="form-control" required>
                            @error('motivo')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Tipo (Requerido) -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tipo" class="bmd-label-floating">Tipo</label>
                            <input wire:model="tipo" type="text" id="tipo" class="form-control" required>
                            @error('tipo')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Responsable (Requerido) -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="responsable" class="bmd-label-floating">Responsable</label>
                            <input wire:model="responsable" type="text" id="responsable" class="form-control"
                                required>
                            @error('responsable')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Fecha de Atención (Requerido) -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="fecha_atencion" class="bmd-label-floating">Fecha de Atención</label>
                            <input wire:model="fecha_atencion" type="date" id="fecha_atencion" class="form-control"
                                required>
                            @error('fecha_atencion')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Descripción Motivo (Opcional) -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="descripcion_motivo" class="bmd-label-floating">Descripción del Motivo</label>
                            <textarea wire:model="descripcion_motivo" id="descripcion_motivo" class="form-control"></textarea>
                            @error('descripcion_motivo')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Otros Datos (Opcional) -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="otros_datos" class="bmd-label-floating">Otros Datos</label>
                            <textarea wire:model="otros_datos" id="otros_datos" class="form-control"></textarea>
                            @error('otros_datos')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Botón de Enviar -->
                    <div class="col-4">
                        <button type="submit"
                            class="w-full px-6 py-3 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Registrar Atención
                        </button>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
