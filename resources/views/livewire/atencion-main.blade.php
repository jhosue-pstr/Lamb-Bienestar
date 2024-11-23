<x-app-layout>

    <div class="py-12">
        <!-- Botón para regresar a la página de historial-main con una flecha -->
        <div class="flex justify-start mb-4">
            <a href="{{ route('historial') }}" class="inline-flex items-center px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                <i class="mr-2 fa-solid fa-arrow-left"></i> <!-- Ícono de flecha hacia la izquierda -->
            </a>
        </div>

        <h2 class="text-3xl font-bold text-gray-800">Atenciones de {{ $estudiante->nombre }}</h2>
        <div class="mt-2 border-b-2 border-info-600 w-60"></div>
    </div>
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg dark:bg-gray-800/50 dark:bg-gradient-to-bl">
            <!-- Input de búsqueda si es necesario -->
            <div class="flex items-center justify-between gap-2 p-2 mb-2 bg-indigo-100 rounded-md">
                <div class="w-full gap-2">
                    <div class="w-2/4 mb-2">
                        <input
                            type="text"
                            wire:model.live="search"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md form-input"
                            placeholder="Buscar por motivo de atención..."
                        />
                    </div>
                </div>
            </div>

            <!-- Barra de encabezados con los campos correctos -->
            <div class="grid grid-cols-6 gap-2 pb-2 mt-4 text-sm font-bold text-indigo-600 border-b-2 border-gray-300">
                <div>Motivo</div>
                <div>Tipo</div>
                <div>Responsable</div>
                <div>Fecha de Atención</div>
                <div>Estado</div>
                <div>Opciones</div>
            </div>

            <!-- Grid con las atenciones del estudiante -->
            <div class="grid grid-cols-1 gap-2 mt-6">
                @foreach ($atenciones as $atencion)
                    <div class="w-full relative bg-blue-50 p-4 rounded-md shadow-lg h-auto motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="absolute top-0 left-0 w-full py-1 text-center text-white bg-gray-600 rounded-t-lg text-md">
                            <i class="fa-solid fa-quote-left"></i> {{$atencion->id}} <i class="fa-solid fa-quote-right"></i>
                        </div>

                        <!-- Datos de la atención, todo en una sola fila -->
                        <div class="grid grid-cols-6 gap-2 mt-4 text-sm">
                            <div class="px-2 py-1">{{ $atencion->motivo_de_atencion ?? 'No disponible' }}</div>
                            <div class="px-2 py-1">{{ $atencion->tipo ?? 'No disponible' }}</div>
                            <div class="px-2 py-1">{{ $atencion->resposable ?? 'No disponible' }}</div>
                            <div class="px-2 py-1">{{ $atencion->fecha_atencion ?? 'No disponible' }}</div>
                            <div class="px-2 py-1">{{ $atencion->estado ?? 'No disponible' }}</div>
                            <div class="px-2 py-1">
                                <!-- Botón para ver los detalles de la atención -->
                                {{-- <a href="{{ route('atencion.detalles', ['atencion_id' => $atencion->id]) }}">
                                    <button class="px-4 py-2 text-white transition-all duration-300 bg-blue-600 rounded-md hover:bg-blue-700">
                                        Ver Detalles
                                    </button>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Si no hay atenciones -->
            <div class="mt-2">
                @if(!$atenciones->count())
                    <x-alert title="* No existen atenciones para este estudiante" info />
                @endif
            </div>
        </div>
        <div class="mt-2">
            {{ $atenciones->links() }} <!-- Paginación -->
        </div>
    </div>
</x-app-layout>
