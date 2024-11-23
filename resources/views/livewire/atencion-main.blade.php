<x-app-layout>
    <div class="py-12">
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
            <div class="grid grid-cols-6 gap-2 pb-2 mt-4 text-sm font-bold text-indigo-600 border-b-2 border-gray-300">
                <div>Motivo</div>
                <div>Tipo</div>
                <div>Responsable</div>
                <div>Fecha de Atención</div>
                <div>Estado</div>
                <div>Opciones</div>
            </div>

            <div class="grid grid-cols-1 gap-2 mt-6">
                @foreach ($atenciones as $atencion)
                    <div class="relative w-full h-auto p-4 rounded-md shadow-lg bg-blue-50">
                        <div class="absolute top-0 left-0 w-full py-1 text-center text-white bg-gray-600 rounded-t-lg text-md">
                            <i class="fa-solid fa-quote-left"></i> {{ $atencion->id }} <i class="fa-solid fa-quote-right"></i>
                        </div>

                        <!-- Verificar si la atención debe estar expandida -->
                        @if ($expandedAtencionId == $atencion->id)
                            <!-- Detalles de la atención -->
                            <div class="grid grid-cols-2 gap-2 mt-4 text-sm">
                                <div class="px-2 py-1"><strong>Motivo:</strong> {{ $atencion->motivo_atencion }}</div>
                                <div class="px-2 py-1"><strong>Tipo:</strong> {{ $atencion->tipo }}</div>
                                <div class="px-2 py-1"><strong>Responsable:</strong> {{ $atencion->resposable }}</div>
                                <div class="px-2 py-1"><strong>Fecha de Atención:</strong> {{ $atencion->fecha_atencion }}</div>
                                <div class="px-2 py-1"><strong>Estado:</strong> {{ $atencion->estado }}</div>
                                <div class="px-2 py-1"><strong>Observaciones:</strong> {{ $atencion->observaciones }}</div>
                                <div class="px-2 py-1"><strong>Descripción del Motivo:</strong> {{ $atencion->descripcion_motivo }}</div>
                                <div class="px-2 py-1"><strong>Otros Datos:</strong> {{ $atencion->otros_datos }}</div>
                                <div class="px-2 py-1"><strong>Seguimiento de Caso:</strong> {{ $atencion->seguimiento_de_caso }}</div>
                                <div class="px-2 py-1">
                                    <a href="{{ route('atencion.main', ['estudiante_id' => $estudiante->id]) }}" class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700">
                                        Ocultar Detalles
                                    </a>
                                </div>
                            </div>
                        @else
                            <!-- Vista básica de la atención -->
                            <div class="grid grid-cols-6 gap-2 mt-4 text-sm">
                                <div class="px-2 py-1">{{ $atencion->motivo_atencion ?? 'No disponible' }}</div>
                                <div class="px-2 py-1">{{ $atencion->tipo ?? 'No disponible' }}</div>
                                <div class="px-2 py-1">{{ $atencion->resposable ?? 'No disponible' }}</div>
                                <div class="px-2 py-1">{{ $atencion->fecha_atencion ?? 'No disponible' }}</div>
                                <div class="px-2 py-1">{{ $atencion->estado ?? 'No disponible' }}</div>
                                <div class="px-2 py-1">
                                    <a href="{{ route('atencion.main', ['estudiante_id' => $estudiante->id, 'expanded_atencion' => $atencion->id, 'page' => $atenciones->currentPage()]) }}" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                        Ver Detalles
                                    </a>

                                </div>
                            </div>
                        @endif
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

        <!-- Paginación -->
        <div class="mt-2">
            {{ $atenciones->links() }}
        </div>
    </div>
</x-app-layout>
