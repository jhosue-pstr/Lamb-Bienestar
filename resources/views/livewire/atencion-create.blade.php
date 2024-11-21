<div class="py-2">
    <div class="mx-6 mb-4">
        <h2 class="text-3xl font-bold text-gray-800">Atenciones</h2>
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
                            wire:model="search"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md form-input"
                            placeholder="Buscar atenciones..."
                        />
                    </div>
                </div>
            </div>
            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                @foreach ($atencioness as $atencion)
                    <div class="w-full relative bg-blue-50 p-4 rounded-md shadow-lg h-44 motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="absolute top-0 left-0 w-full py-1 text-center text-white bg-gray-600 rounded-t-lg text-md">
                            <i class="fa-solid fa-quote-left"></i> {{$atencion->id}} <i class="fa-solid fa-quote-right"></i>
                        </div>
                        <div class="flex h-full gap-4 mt-2 text-sm">
                            <div class="flex items-center">
                                <i class="text-3xl fa-solid fa-clock text-cyan-700"></i>
                            </div>
                            <div class="flex items-center h-full col-span-2">
                                <div>
                                    <div><span class="font-bold text-indigo-600">Motivo de Atención: </span> {{$atencion->motivo_de_atencion}}</div>
                                    <div><span class="font-bold text-indigo-600">Tipo: </span> {{$atencion->tipo}}</div>
                                    <div><span class="font-bold text-indigo-600">Responsable: </span> {{$atencion->resposable}}</div>
                                    <div><span class="font-bold text-indigo-600">Fecha de Atención: </span> {{$atencion->fecha_atencion}}</div>
                                    <div><span class="font-bold text-indigo-600">Descripción: </span> {{$atencion->descripcion_motivo}}</div>
                                    <div><span class="font-bold text-indigo-600">Observaciones: </span> {{$atencion->observaciones}}</div>
                                    <div><span class="font-bold text-indigo-600">Seguimiento de Caso: </span> {{$atencion->seguimiento_de_caso}}</div>
                                    <div><span class="font-bold text-indigo-600">Otros Datos: </span> {{$atencion->otros_datos}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-2 right-2">
                            <x-mini-button rounded primary icon="pencil" wire:click="edit({{$atencion}})" />
                            <x-mini-button rounded warning icon="exclamation-triangle" wire:click="delete({{$atencion}})" />
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-2">
                @if(!$atencioness->count())
                    <x-alert title="* No existe ningún registro coincidente" info />
                @endif
            </div>
        </div>
        <div class="mt-2">
            {{$atencioness->links()}}
        </div>
    </div>
</div>
