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
                        <input
                            type="text"
                            wire:model.live="search"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md form-input"
                            placeholder="Buscar historial por nombre..."
                        />
                    </div>
                </div>
            </div>

            <!-- Grid con una sola columna (1 por fila) -->
            <div class="grid grid-cols-1 gap-4 mt-6"> <!-- Añadí mt-4 aquí para darle margen superior -->
                @foreach ($historias as $historial)
                    <div class="w-full relative bg-blue-50 p-4 rounded-md shadow-lg h-auto motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="absolute top-0 left-0 w-full py-1 text-center text-white bg-gray-600 rounded-t-lg text-md">
                            <i class="fa-solid fa-quote-left"></i> {{$historial->id}} <i class="fa-solid fa-quote-right"></i>
                        </div>

                        <!-- Contenedor de los datos en una fila (usando grid) -->
                        <div class="grid grid-cols-5 gap-4 mt-4 text-sm">
                            <!-- Mostrar los datos del estudiante y tipo -->
                            <div class="flex flex-col items-start">
                                <span class="font-bold text-indigo-600">Nombre:</span>
                                <span>{{ $historial->estudiante->nombre ?? 'No disponible' }}</span>
                            </div>
                            <div class="flex flex-col items-start">
                                <span class="font-bold text-indigo-600">Apellido:</span>
                                <span>{{ $historial->estudiante->apellido ?? 'No disponible' }}</span>
                            </div>
                            <div class="flex flex-col items-start">
                                <span class="font-bold text-indigo-600">Facultad:</span>
                                <span>{{ $historial->estudiante->facultad ?? 'No disponible' }}</span>
                            </div>
                            <div class="flex flex-col items-start">
                                <span class="font-bold text-indigo-600">Escuela:</span>
                                <span>{{ $historial->estudiante->escuela ?? 'No disponible' }}</span>
                            </div>
                            <div class="flex flex-col items-start">
                                <span class="font-bold text-indigo-600">Tipo:</span>
                                <span>{{ $historial->tipo ?? 'No disponible' }}</span>
                            </div>
                        </div>

                        <!-- Descripción, fecha y otros datos -->
                        <div class="mt-4">
                            <div><span class="font-bold text-indigo-600">Descripción: </span> {{$historial->descripcion}}</div>
                        </div>

                        <div class="absolute bottom-2 right-2">
                            <x-mini-button rounded primary icon="pencil" wire:click="edit({{$historial}})" />
                            <x-mini-button rounded warning icon="exclamation-triangle" wire:click="delete({{$historial}})" />
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-2">
                @if(!$historias->count())
                    <x-alert title="* No existe ningún registro coincidente" info />
                @endif
            </div>
        </div>
        <div class="mt-2">
            {{$historias->links()}}
        </div>
    </div>
</div>
