<div class="min-h-screen bg-gray-100 py-10">
    <div class="container mx-auto px-6 mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Selecciona una Beca</h1>
        <p class="text-gray-600 mt-1">Elige el tipo de beca y revisa los requisitos.</p>
    </div>
    <div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
        @foreach ($becas as $beca)
            <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col border border-gray-500 hover:shadow-2xl hover:scale-105 transform transition duration-200 ease-in-out">
                <!-- Ícono de la beca -->
                <div class="relative">
                    <img src="{{ $beca['icono'] }}" alt="{{ $beca['nombre'] }}" class="w-full h-36 object-cover rounded-md mb-2">
                </div>
                <!-- Título y descripción -->
                <h2 class="mt-2 text-lg font-bold text-gray-800 text-center">{{ $beca['nombre'] }}</h2>
                <p class="text-gray-600 mt-1 text-center text-sm leading-tight">{{ $beca['descripcion'] }}</p>
                <!-- Lista de requisitos -->
                <ul class="mt-3 divide-y divide-gray-200 flex-1">
                    @foreach ($beca['requisitos'] as $requisito)
                        <li class="flex items-start py-2">
                            <!-- Ícono -->
                            <div class="flex items-center justify-center w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8.828a2 2 0 00-.586-1.414l-4.828-4.828A2 2 0 0012 2zm0 7h4v2h-4V9zm0 4h4v2h-4v-2zm-6 0h4v2H6v-2zm0-4h4v2H6V9z" />
                                </svg>
                            </div>
                            <!-- Texto -->
                            <span class="ml-3 text-gray-800 text-sm leading-tight">{{ $requisito }}</span>
                        </li>
                    @endforeach
                </ul>
                <!-- Botón al final -->
                <button wire:click="seleccionarBeca('{{ $beca['nombre'] }}')"
                            class="mt-4 bg-gradient-to-r from-green-500 to-blue-600 text-white px-3 py-2 rounded-md shadow-md hover:scale-105 transform transition duration-200 ease-in-out w-full">
                    Seleccionar
                    </button>
                </div>
        @endforeach
    </div>
</div>
