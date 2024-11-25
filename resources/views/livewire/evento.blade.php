<div class="py-2">
    <div class="mx-6 mb-4">
        <h2 class="text-3xl font-bold text-gray-800">Eventos</h2>
        <div class="border-b-2 border-info-600 w-60 mt-2"></div>
    </div>
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 dark:bg-gray-800/50 dark:bg-gradient-to-bl">
            <div class="flex items-center justify-between gap-2 bg-indigo-100 p-2 mb-2 rounded-md">
                <div class="flex gap-2">
                    <x-input wire:model.live="buscador" placeholder="Buscar evento por nombre" />

                    <x-button secondary label="Todos" wire:click="$set('estadoFiltro', '')" />
                    <x-button primary label="Activos" wire:click="$set('estadoFiltro', 'activo')" />
                    <x-button danger label="Inactivos" wire:click="$set('estadoFiltro', 'inactivo')" />

                    <div>
                        <x-button primary label="Nuevo" icon="plus" wire:click="store()"></x-button>
                    </div>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($eventos as $evento)
                    @if (
                        (empty($estadoFiltro) ||
                            ($estadoFiltro == 'activo' && $evento->estado) ||
                            ($estadoFiltro == 'inactivo' && !$evento->estado)) &&
                            (empty($buscador) || stripos($evento->nombre, $buscador) !== false))
                        <div
                            class="w-full relative bg-blue-50 p-4 rounded-md shadow-lg h-44 motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div
                                class="absolute text-md left-0 top-0 bg-gray-600 text-white w-full py-1 text-center rounded-t-lg">
                                <i class="fa-solid fa-quote-left"></i> {{ $evento->id }} <i
                                    class="fa-solid fa-quote-right"></i>
                            </div>
                            <div class="flex gap-4 mt-2 text-sm h-full">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-user text-3xl text-cyan-700"></i>
                                </div>
                                <div class="col-span-2 flex items-center h-full">
                                    <div>
                                        <div><span class="font-bold text-indigo-600">Nombre: </span>
                                            {{ $evento->nombre }}</div>
                                        <div><span class="font-bold text-indigo-600">Descripción: </span>
                                            {{ $evento->descripcion }}</div>
                                        <div><span class="font-bold text-indigo-600">Estado: </span>
                                            {{ $evento->estado ? 'Activo' : 'Inactivo' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="mt-2">
                @if (!$eventos->count())
                    <x-alert title="* No existe ningún evento coincidente" info />
                @endif
            </div>
        </div>
    </div>
</div>
