<div class="p-6 bg-white rounded-lg shadow-lg">
    <!-- Encabezado de la página -->
    <div class="flex justify-between items-center border-b-2 border-gray-200 pb-4 mb-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800">Generar solicitud de beca - {{ strtoupper($tipoBeca) }}</h1>
            <p class="text-sm text-gray-500">Completar requisitos de la beca seleccionada</p>
        </div>
        <div class="text-right">
            <h2 class="text-lg font-semibold text-gray-700">Estudiante:</h2>
            <p class="text-sm text-gray-500">Reginaldo Dan Mayhuire Buendia</p>
            <p class="text-sm text-gray-500">Plan: Ingeniería de Sistemas, Presencial 2023-1</p>
        </div>
    </div>

    <!-- Información de la beca seleccionada -->
    <div class="mb-6 p-4 bg-gray-50 border border-gray-200 rounded-lg">
        <h3 class="text-lg font-bold text-gray-800 mb-2">Beca seleccionada: {{ ucfirst($tipoBeca) }}</h3>
        <p class="text-sm text-gray-600">Por favor, complete los siguientes pasos para procesar su solicitud.</p>
    </div>

    <!-- Tabla de requisitos -->
    <table class="table-auto w-full text-left border-collapse">
        <thead>
            <tr class="bg-blue-500 text-white uppercase text-sm leading-normal">
                <th class="py-3 px-6">#</th>
                <th class="py-3 px-6">Requisitos</th>
                <th class="py-3 px-6">Descripción</th>
                <th class="py-3 px-6">Archivos</th>
                <th class="py-3 px-6">Observación</th>
                <th class="py-3 px-6">Estado</th>
                <th class="py-3 px-6">Opciones</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($requisitos as $index => $requisito)
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                    <!-- ID -->
                    <td class="py-3 px-6">{{ $index + 1 }}</td>

                    <!-- Nombre del requisito -->
                    <td class="py-3 px-6">{{ $requisito }}</td>

                    <!-- Botón para ver descripción -->
                    <td class="py-3 px-6 text-center">
                        <button wire:click="showDescription({{ $index }})"
                            class="text-blue-500 hover:text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 4.5C7.305 4.5 3.445 7.65 1.93 12c1.515 4.35 5.375 7.5 10.07 7.5s8.555-3.15 10.07-7.5C20.555 7.65 16.695 4.5 12 4.5zm0 11.25c-2.1 0-3.75-1.65-3.75-3.75s1.65-3.75 3.75-3.75 3.75 1.65 3.75 3.75-1.65 3.75-3.75 3.75zm0-6c-1.24 0-2.25 1.01-2.25 2.25s1.01 2.25 2.25 2.25 2.25-1.01 2.25-2.25-1.01-2.25-2.25-2.25z" />
                            </svg>
                        </button>
                    </td>

                    <!-- Input para subir archivo -->
                    <td class="py-3 px-6">
                        <input type="file" wire:model="archivos.{{ $index }}"
                            class="file-input border rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    </td>

                    <!-- Observación -->
                    <td class="py-3 px-6">
                        <input type="text" wire:model.defer="comentarios.{{ $index }}"
                            placeholder="Comentario del asesor"
                            class="border rounded-lg px-2 py-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    </td>

                    <!-- Estado -->
                    <td class="py-3 px-6">
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800">
                            Pendiente
                        </span>
                    </td>

                    <!-- Opciones -->
                    <td class="py-3 px-6 flex space-x-2">
                        <!-- Resubir botón -->
                        <button class="bg-yellow-500 text-white px-2 py-2 rounded-full hover:bg-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 12l-7-8v6H3v4h9v6zM2 19h20v2H2v-2z" />
                            </svg>
                        </button>
                        <!-- Eliminar botón -->
                        <button class="bg-red-500 text-white px-2 py-2 rounded-full hover:bg-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 6h-4.5l-1-1h-5l-1 1H5v2h14V6zM6 9v11c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9H6z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Botón para enviar -->
    <div class="mt-6 text-right">
        <button wire:click="enviarSolicitud"
            class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-white px-6 py-3 rounded-lg hover:opacity-90 transform transition">
            Enviar Solicitud
        </button>
    </div>
</div>
