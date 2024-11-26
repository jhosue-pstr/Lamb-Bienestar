<x-app-layout>
    <div class="container py-10 mx-auto">
        <h2 class="mb-6 text-3xl font-extrabold text-green-500">Editar Evento</h2>

        <form action="{{ route('actualizar-evento', $evento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Campo: Nombre del evento -->
            <div class="mb-4">
                <label for="nombre" class="block font-bold text-green-500">Nombre del Evento</label>
                <input type="text" name="nombre" id="nombre" value="{{ $evento->nombre }}" class="w-full p-2 font-bold text-black border rounded" required>
            </div>

            <!-- Campo: Tipo del evento -->
            <div class="mb-4">
                <label for="tipo" class="block font-bold text-green-500">Tipo de Evento</label>
                <select name="tipo" id="tipo" class="w-full p-2 font-bold text-black bg-white border rounded" required>
                    <option value="carrera" {{ $evento->tipo == 'carrera' ? 'selected' : '' }} class="font-bold text-black bg-gray-200">Carrera</option>
                    <option value="todos" {{ $evento->tipo == 'todos' ? 'selected' : '' }} class="font-bold text-black bg-gray-200">Todos</option>
                </select>
            </div>

            <!-- Campo: Ubicación -->
            <div class="mb-4">
                <label for="ubicacion" class="block font-bold text-green-500">Ubicación</label>
                <input type="text" name="ubicacion" id="ubicacion" value="{{ $evento->ubicacion }}" class="w-full p-2 font-bold text-black border rounded" required>
            </div>

            <!-- Campo: Fecha -->
            <div class="mb-4">
                <label for="fecha" class="block font-bold text-green-500">Fecha</label>
                <input type="date" name="fecha" id="fecha" value="{{ $evento->fecha }}" class="w-full p-2 font-bold text-black border rounded" required>
            </div>

            <!-- Campo: Hora -->
            <div class="mb-4">
                <label for="hora" class="block font-bold text-green-500">Hora</label>
                <input type="time" name="hora" id="hora" value="{{ $evento->hora }}" class="w-full p-2 font-bold text-black border rounded" required>
            </div>

            <!-- Campo: Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block font-bold text-green-500">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="w-full p-2 font-bold text-black border rounded" required>{{ $evento->descripcion }}</textarea>
            </div>

            <!-- Botones para Guardar o Cancelar -->
            <div class="flex gap-4">
                <button type="submit" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Actualizar</button>
                <a href="{{ route('creacion-evento') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
