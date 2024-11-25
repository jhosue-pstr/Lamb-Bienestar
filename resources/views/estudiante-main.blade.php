@inject('carbon', 'Carbon\Carbon')

<div class="py-2">
    <!-- Título principal -->
    <div class="mx-6 mb-4">
        <h2 class="text-3xl font-bold text-gray-800">Información del Estudiante</h2>
        <div class="mt-2 border-b-2 border-info-600 w-60"></div>
    </div>

    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg dark:bg-gray-800/50 dark:bg-gradient-to-bl">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <!-- Parte izquierda: Información del Estudiante -->
                <div class="p-4 mb-4 bg-white rounded-md shadow-md">
                    @if ($estudiante)
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
                    @else
                        <p>No se encontró información del estudiante.</p>
                    @endif
                </div>

                <!-- Parte derecha: Citas del Estudiante -->
                <div class="p-4 bg-gray-100 rounded-md">
                    <h3 class="text-lg font-semibold">Citas del Estudiante</h3>

                    @if ($citas && $citas->count())
                        @foreach ($citas as $cita)
                            <div class="p-4 mb-4 bg-white rounded-md shadow-md">
                                <div class="flex justify-between">
                                    <div>
                                        <p><strong>ID:</strong> {{ $cita->id }}</p>
                                        <p><strong>Área:</strong> {{ $cita->area }}</p>
                                        <p><strong>Fecha:</strong> {{ $carbon::parse($cita->fecha)->format('d/m/Y') }}</p>
                                        <p><strong>Hora:</strong> {{ $carbon::parse($cita->hora)->format('H:i') }}</p>

                                        <!-- Estado y íconos -->
                                        <div class="flex items-center mt-2 space-x-2">
                                            @if ($cita->estado == 'asistio')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M10 2l3 6h6l-4 4 1 6-5-3-5 3 1-6-4-4h6l3-6z"/></svg>
                                                <p class="text-green-500">Asistió</p>
                                            @elseif ($cita->estado == 'pendiente')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M10 2a8 8 0 11-8 8 8 8 0 018-8zM9 5v6h2V5H9z"/></svg>
                                                <p class="text-yellow-500">Pendiente</p>
                                            @elseif ($cita->estado == 'no asistio')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-7h2v2h-2v-2zm0-4h2v2h-2V7z" clip-rule="evenodd"/></svg>
                                                <p class="text-red-500">No asistió</p>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="{{ route('cita.detalle', $cita->id) }}">
                                        <x-button sm primary label="Más Información" class="text-black" />
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        <div class="mt-4">
                            {{ $citas->links() }} <!-- Paginación -->
                        </div>
                    @else
                        <p>No tienes citas registradas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
