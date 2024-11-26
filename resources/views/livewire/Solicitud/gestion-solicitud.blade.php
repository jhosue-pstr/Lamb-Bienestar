<div class="p-6 bg-white rounded-lg shadow-lg">
    <!-- Encabezado de la página -->
    <div class="flex justify-between items-center border-b-2 border-gray-200 pb-4 mb-6">
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
    <div class="mb-8 p-4 bg-gray-50 border border-gray-200 rounded-lg">
        <h3 class="text-lg font-bold text-gray-800 mb-2">Beca seleccionada: {{ ucfirst($tipoBeca) }}</h3>
        <p class="text-sm text-gray-600">Por favor, complete los siguientes pasos para procesar su solicitud.</p>
    </div>

    <!-- Tabla de requisitos -->
    <table class="table-auto w-full text-left border-collapse">
        <thead>
            <tr class="bg-blue-500 text-white uppercase text-sm leading-normal">
                <th class="py-4 px-6">#</th>
                <th class="py-4 px-6">Requisitos</th>
                <th class="py-4 px-6">Descripción</th>
                <th class="py-4 px-6">Archivos</th>
                <th class="py-4 px-6">Observación</th>
                <th class="py-4 px-6">Estado</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($requisitos as $index => $requisito)
                <tr class="border-b border-gray-200 hover:bg-gray-100 transition my-4">
                    <!-- ID -->
                    <td class="py-6 px-6">{{ $index + 1 }}</td>

                    <!-- Nombre del requisito -->
                    <td class="py-6 px-6">{{ $requisito }}</td>

                    <!-- Botón para ver descripción -->
                    <td class="py-6 px-6 text-center">
                        <a href="{{ route('requisito.pdf', $index) }}" target="_blank" class="text-blue-500 hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 4.5C7.305 4.5 3.445 7.65 1.93 12c1.515 4.35 5.375 7.5 10.07 7.5s8.555-3.15 10.07-7.5C20.555 7.65 16.695 4.5 12 4.5zm0 11.25c-2.1 0-3.75-1.65-3.75-3.75s1.65-3.75 3.75-3.75 3.75 1.65 3.75 3.75-1.65 3.75-3.75 3.75zm0-6c-1.24 0-2.25 1.01-2.25 2.25s1.01 2.25 2.25 2.25 2.25-1.01 2.25-2.25-1.01-2.25-2.25-2.25z" />
                            </svg>
                        </a>
                    </td>


                    <!-- Input para subir archivo -->
                    <td class="py-6 px-6 text-center">
                        <button class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.59 5.41L12 8l-2.59-2.59L8 7l4 4 4-4zM12 12l4-4 4 4-4 4z" />
                            </svg>
                        </button>
                    </td>

                    <!-- Observación -->
                    <td class="py-6 px-6">
                        <input type="text" wire:model.defer="comentarios.{{ $index }}"
                            placeholder="Comentario del asesor"
                            class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    </td>

                    <!-- Estado -->
                    <td class="py-6 px-6">
                        <span class="px-3 py-2 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800">
                            Pendiente
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Botón para enviar -->
    <div class="mt-8 text-right">
        <button wire:click="enviarSolicitud"
            class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-white px-6 py-3 rounded-lg hover:opacity-90 transform transition">
            Enviar Solicitud
        </button>
    </div>
</div>
