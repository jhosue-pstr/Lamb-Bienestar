<x-app-layout>
    <div class="container py-10 mx-auto">
        <!-- Encabezado con el título y el botón para crear un nuevo evento -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold">Gestión de Eventos</ <!-- Botón para "Crear Evento" -->
                <a href="{{ route('creacion-evento-detalles') }}"
                    style="padding: 16px 32px; font-size: 18px; font-weight: bold; color: white; background-color: #28a745; border-radius: 8px; display: inline-block; margin-left: 20px;"
                    class="hover:bg-green-700 focus:bg-green-700">
                    Crear Evento
                </a>

        </div>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Listado de eventos creados -->
        <div class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-2 md:grid-cols-3">
            @foreach ($eventos as $evento)
                <div class="p-6 transition bg-white rounded shadow hover:shadow-lg">
                    <!-- Mostrar afiche del evento (si existe) -->
                    @if ($evento->afiche && file_exists(public_path($evento->afiche)))
                        <img src="{{ asset($evento->afiche) }}" alt="Afiche"
                            class="object-cover w-full h-48 mb-4 rounded">
                    @else
                        <p class="text-gray-400">No hay afiche disponible</p>
                    @endif
                    <h3 class="text-xl font-bold">{{ $evento->nombre }}</h3>
                    <p class="text-gray-700">{{ $evento->descripcion }}</p>

                    <!-- Botón de "Más información" -->
                    <a href="{{ route('evento-detalle', $evento->id) }}" class="block mt-4 text-blue-500">Más
                        información</a>

                    <!-- Botones "Editar" y "Eliminar" en la misma línea -->
                    <div class="flex gap-4 mt-4">
                        <!-- Botón de "Editar" -->
                        <a href="{{ route('editar-evento', $evento->id) }}"
                            class="px-4 py-2 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                            Editar
                        </a>

                        <!-- Botón de "Eliminar" -->
                        <form action="{{ route('eliminar-evento', $evento->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 text-white bg-red-600 border border-red-600 rounded hover:bg-red-700 hover:border-red-700"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este evento?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
