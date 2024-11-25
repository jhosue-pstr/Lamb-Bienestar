<div class="py-2">
    <div class="mx-6 mb-4">
        <h2 class="text-3xl font-bold text-gray-800">Historial de Registros</h2>
        <div class="mt-2 border-b-2 border-info-600 w-60"></div>
    </div>
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg dark:bg-gray-800/50 dark:bg-gradient-to-bl">
            <div class="flex items-center justify-between gap-2 p-2 mb-2 bg-indigo-100 rounded-md">
                <div class="flex w-full gap-2">
                    <!-- Input de búsqueda -->
                    <div class="w-2/4 mb-2">
                        <input type="text" wire:model.live="search"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md form-input"
                            placeholder="Buscar historial por nombre..." />
                    </div>
                </div>
            </div>

            <!-- Barra de encabezados con los campos correctos -->
            <div class="grid grid-cols-6 gap-2 pb-2 mt-4 text-sm font-bold text-indigo-600 border-b-2 border-gray-300">
                <div>Nombre</div>
                <div>Apellido</div>
                <div>Facultad</div>
                <div>Escuela</div>
                <div>Tipo</div> <!-- Cambié Descripción por Tipo -->
                <div>Opciones</div> <!-- Columna para las opciones -->
            </div>

            <!-- Grid con los registros y todos los datos en una sola fila -->
            <div class="grid grid-cols-1 gap-2 mt-6">
                @foreach ($historias as $historial)
                    <div
                        class="w-full relative bg-blue-50 p-4 rounded-md shadow-lg h-auto motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div
                            class="absolute top-0 left-0 w-full py-1 text-center text-white bg-gray-600 rounded-t-lg text-md">
                            <i class="fa-solid fa-quote-left"></i> {{ $historial->id }} <i
                                class="fa-solid fa-quote-right"></i>
                        </div>

                        <!-- Datos del historial, todo en una sola fila -->
                        <div class="grid grid-cols-6 gap-2 mt-4 text-sm">
                            <div class="px-2 py-1">{{ $historial->estudiante->nombre ?? 'No disponible' }}</div>
                            <div class="px-2 py-1">{{ $historial->estudiante->apellidoPaterno ?? 'No disponible' }}
                            </div>
                            <div class="px-2 py-1">{{ $historial->estudiante->facultad ?? 'No disponible' }}</div>
                            <div class="px-2 py-1">{{ $historial->estudiante->escuela ?? 'No disponible' }}</div>
                            <div class="px-2 py-1">{{ $historial->tipo ?? 'No disponible' }}</div>
                            <!-- Mostramos "Tipo" en vez de "Descripción" -->
                            <div class="px-2 py-1">
                                <!-- Botón para redirigir al formulario de atención -->
                                <a href="{{ route('atencion.main', ['estudiante_id' => $historial->estudiante->id]) }}">
                                    <button
                                        class="px-4 py-2 text-white transition-all duration-300 bg-blue-600 rounded-md hover:bg-blue-700">
                                        Ver Atenciones
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-2">
                @if (!$historias->count())
                    <x-alert title="* No existe ningún registro coincidente" info />
                @endif
            </div>
        </div>
        <div class="mt-2">
            {{ $historias->links() }}
        </div>
    </div>
</div>
