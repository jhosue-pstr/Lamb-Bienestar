@inject('carbon', 'Carbon\Carbon')

<div class="py-4">
    <!-- Título -->
    <div class="mx-6 mb-4">
        <h2 class="text-3xl font-bold text-gray-800">Detalles de la Cita</h2>
        <div class="mt-2 border-b-2 border-info-600 w-60"></div>
    </div>

    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg dark:bg-gray-800/50 dark:bg-gradient-to-bl">

            <!-- Información de la Cita -->
            <div class="p-4 mb-4 bg-white rounded-md shadow-md">
                <h3 class="text-xl font-semibold">Información de la Cita</h3>
                <p><strong>ID:</strong> {{ $cita->id }}</p>
                <p><strong>Área:</strong> {{ $cita->area }}</p>
                <p><strong>Fecha:</strong> {{ $carbon::parse($cita->fecha)->format('d/m/Y') }}</p>
                <p><strong>Hora:</strong> {{ $carbon::parse($cita->hora)->format('H:i') }}</p>
                <p><strong>Estado:</strong>
                    @if ($cita->estado == 'asistio')
                        <span class="text-green-500">✔ Asistió</span>
                    @elseif ($cita->estado == 'pendiente')
                        <span class="text-yellow-500">⌛ Pendiente</span>
                    @elseif ($cita->estado == 'no asistio')
                        <span class="text-red-500">❌ No asistió</span>
                    @endif
                </p>
                <div>
                    <!-- Verifica si la cita está en estado "asistió" -->
                    @if ($cita->estado == 'asistio')
                        <div>
                            <p class="text-black">Gracias por asistir. Califica tu experiencia:</p>

                            <!-- Formulario para calificación -->
                            <div class="mt-4">
                                <label for="calificacion" class="block">Calificación (1 a 5):</label>
                                <input type="number" wire:model="calificacion" id="calificacion" min="1" max="5" class="w-20 p-2 border rounded">

                                <label for="comentario" class="block mt-2">Comentario (Opcional):</label>
                                <textarea wire:model="comentario" id="comentario" class="w-full p-2 border rounded" rows="4"></textarea>

                                <x-button sm primary label="Enviar" wire:click="guardarCalificacion" class="mt-4 text-black" />
                            </div>
                        </div>
                    @endif

                    <!-- Mensaje de éxito -->
                    @if (session()->has('message'))
                        <div class="mt-4 text-green-500">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

            <!-- Información del Estudiante -->
            <div class="p-4 bg-white rounded-md shadow-md">
                <h3 class="text-xl font-semibold">Información del Estudiante</h3>
                <div class="flex items-center space-x-4">
                    <img src="{{ $estudiante->foto ?? '/path/to/default-avatar.jpg' }}" alt="Foto del estudiante" class="w-20 h-20 rounded-full">
                    <div>
                        <p><strong>Código:</strong> {{ $estudiante->codigo ?? 'No disponible' }}</p>
                        <p><strong>Nombre:</strong> {{ $estudiante->nombre ?? 'No disponible' }}</p>
                        <p><strong>Apellidos:</strong> {{ $estudiante->apellidoPaterno ?? '' }} {{ $estudiante->apellidoMaterno ?? '' }}</p>
                        <p><strong>DNI:</strong> {{ $estudiante->dni ?? 'No disponible' }}</p>
                        <p><strong>Escuela:</strong> {{ $estudiante->escuela ?? 'No disponible' }}</p>
                        <p><strong>Facultad:</strong> {{ $estudiante->facultad ?? 'No disponible' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

