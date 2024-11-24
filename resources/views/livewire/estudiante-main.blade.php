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
                <div>
                    @if ($estudiante)
                        <p><strong>Código:</strong> {{ $estudiante->codigo ?? 'No disponible' }}</p>
                        <p><strong>Nombre:</strong> {{ $estudiante->nombre ?? 'No disponible' }}</p>
                        <p><strong>Apellidos:</strong> {{ $estudiante->apellidoPaterno ?? '' }} {{ $estudiante->apellidoMaterno ?? '' }}</p>
                        <p><strong>DNI:</strong> {{ $estudiante->dni ?? 'No disponible' }}</p>
                        <p><strong>Escuela:</strong> {{ $estudiante->escuela ?? 'No disponible' }}</p>
                        <p><strong>Facultad:</strong> {{ $estudiante->facultad ?? 'No disponible' }}</p>
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
                                        <p><strong>Estado:</strong> {{ ucfirst($cita->estado) }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <x-button sm primary label="Más Información" wire:click="showMoreInfo({{ $cita->id }})" />
                                    </div>
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

    <!-- Modal para mostrar más información -->
    <x-dialog wire:model="isOpen">
        <x-slot name="title">Más Información</x-slot>
        <x-slot name="content">
            @if ($estudiante)
                <p><strong>Código:</strong> {{ $estudiante->codigo ?? 'No disponible' }}</p>
                <p><strong>Nombre:</strong> {{ $estudiante->nombre ?? 'No disponible' }}</p>
                <p><strong>Apellidos:</strong> {{ $estudiante->apellidoPaterno ?? '' }} {{ $estudiante->apellidoMaterno ?? '' }}</p>
                <p><strong>DNI:</strong> {{ $estudiante->dni ?? 'No disponible' }}</p>
                <p><strong>Escuela:</strong> {{ $estudiante->escuela ?? 'No disponible' }}</p>
                <p><strong>Facultad:</strong> {{ $estudiante->facultad ?? 'No disponible' }}</p>
            @endif

            @if (isset($cita))
                <hr class="my-4">
                <p><strong>ID:</strong> {{ $cita->id ?? 'No disponible' }}</p>
                <p><strong>Área:</strong> {{ $cita->area ?? 'No disponible' }}</p>
                <p><strong>Fecha:</strong> {{ $cita->fecha ? $carbon::parse($cita->fecha)->format('d/m/Y') : 'No disponible' }}</p>
                <p><strong>Hora:</strong> {{ $cita->hora ? $carbon::parse($cita->hora)->format('H:i') : 'No disponible' }}</p>
                <p><strong>Estado:</strong> {{ ucfirst($cita->estado ?? 'No disponible') }}</p>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="closeModal" label="Cerrar" />
        </x-slot>
    </x-dialog>

    <!-- Mensaje cuando los datos del estudiante están cargados -->
    @if ($estudiante)
        <p>Datos del estudiante cargados correctamente.</p>
    @endif
</div>
