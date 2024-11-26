<x-app-layout>
    <div class="container py-10 mx-auto">
        <!-- Encabezado con el título y el botón para crear un nuevo anuncio -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-4xl font-extrabold text-green-500">Gestión de Anuncios
                <!-- Botón para "Crear anuncio" -->
                <a href="{{ route('creacion-anuncio-detalles') }}"
                    style="padding: 16px 32px; font-size: 18px; font-weight: bold; color: white; background-color: #28a745; border-radius: 8px; display: inline-block; margin-left: 20px;"
                    class="hover:bg-green-700 focus:bg-green-700">
                    Crear Anuncio
                </a>
        </div>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Listado de anuncios creados -->
        <div class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-2 md:grid-cols-3">
            @foreach ($anuncios as $anuncio)
                <div class="p-6 transition bg-white rounded shadow hover:shadow-lg">
                    <!-- Mostrar afiche del anuncio (si existe) -->
                    @if ($anuncio->afiche && file_exists(public_path($anuncio->afiche)))
                        <img src="{{ asset($anuncio->afiche) }}" alt="Afiche"
                            class="object-cover w-full h-48 mb-4 rounded">
                    @else
                        <p class="text-gray-400">No hay afiche disponible</p>
                    @endif
                    <h3 class="text-xl font-bold text-green-600">{{ $anuncio->nombre }}</h3>
                    <p class="mt-2 text-gray-700">{{ $anuncio->descripcion }}</p>

                    <!-- Botón de "Más información" -->
                    <a href="{{ route('anuncio-detalle', $anuncio->id) }}"
                        class="block mt-4 font-semibold text-blue-500 hover:underline">
                        Más información
                    </a>

                    <!-- Botones "Editar" y "Eliminar" en la misma línea -->
                    <div class="flex gap-4 mt-4">
                        <!-- Botón de "Editar" -->
                        <a href="{{ route('editar-anuncio', $anuncio->id) }}"
                            class="px-4 py-2 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                            Editar
                        </a>

                        <!-- Botón de "Eliminar" -->
                        <form action="{{ route('eliminar-anuncio', $anuncio->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 text-white bg-red-600 border border-red-600 rounded hover:bg-red-700 hover:border-red-700"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este anuncio?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
