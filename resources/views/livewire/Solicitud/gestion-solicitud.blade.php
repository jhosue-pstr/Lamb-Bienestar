<div class="p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        {{ $tipoBeca == 'alimentos' ? 'Beca de Alimentos' : 'Beca General' }}
    </h1>

    <table class="table-auto w-full text-left border-collapse">
        <thead>
            <tr class="bg-blue-500 text-white uppercase text-sm leading-normal">
                <th class="py-3 px-6">#</th>
                <th class="py-3 px-6">Requisitos</th>
                <th class="py-3 px-6">Descripción</th>
                <th class="py-3 px-6">Archivos</th>
                <th class="py-3 px-6">Observacion</th>
                <th class="py-3 px-6">Estado</th>
                <th class="py-3 px-6">Opciones</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($requisitos as $requisito)
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                    <!-- ID -->
                    <td class="py-3 px-6">{{ $requisito['id'] }}</td>

                    <!-- Nombre del requisito -->
                    <td class="py-3 px-6">{{ $requisito['nombre'] }}</td>

                    <!-- Descripción -->
                    <td class="py-3 px-6">
                        <button class="bg-blue-500 text-red-700 px-3 py-1 rounded-lg hover:bg-blue-900 transition">
                            Ver
                        </button>
                    </td>

                    <!-- Input para subir archivo -->
                    <td class="py-3 px-6">
                        <input type="file" wire:model="archivos.{{ $requisito['id'] }}" class="file-input border-gray-300 rounded-lg" />
                    </td>

                    <!-- Comentarios -->
                    <td class="py-3 px-6">
                        <input type="text" wire:model.defer="comentarios.{{ $requisito['id'] }}"
                            placeholder="Comentario" class="border rounded-lg px-2 py-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    </td>

                    <!-- Estado -->
                    <td class="py-3 px-6">
                        <span
                            class="px-3 py-1 rounded-full text-xs font-bold
                            {{ $requisito['estado'] == 'Pendiente' ? 'bg-yellow-100 text-yellow-800' : ($requisito['estado'] == 'Aprobado' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                            {{ $requisito['estado'] }}
                        </span>
                    </td>

                    <!-- Botones de acción-->
                               <td class="py-2 px-4">
                                <div class="flex space-x-1">
                                    <!-- Botón de Aprobación -->
                                    <button wire:click="actualizarEstado({{ $requisito['id'] }}, 'Aprobado')"
                                        class="bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition shadow flex items-center justify-center text-sm">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <!-- Botón de Rechazo -->
                                    <button wire:click="actualizarEstado({{ $requisito['id'] }}, 'Rechazado')"
                                        class="bg-red-500 text-white p-3 rounded-full hover:bg-red-600 transition shadow flex items-center justify-center text-sm">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Botón para enviar -->
    <div class="mt-6 text-right">
        <button wire:click="enviarSolicitud"
            class="bg-gradient-to-r from-blue-400 to-indigo-500 text-white px-6 py-2 rounded-lg hover:scale-105 transform transition">
            Enviar
        </button>
    </div>
</div>
