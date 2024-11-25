<x-app-layout>
    <div class="container py-10 mx-auto">
        <h2 class="mb-6 text-3xl font-bold">Crear un nuevo evento</h2>

        <form action="{{ route('guardar-evento') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Campo: Nombre del evento -->
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700">Nombre del Evento</label>
                <input type="text" name="nombre" id="nombre" class="w-full p-2 border rounded" required>
            </div>

            <!-- Campo: Tipo del evento -->
            <div class="mb-4">
                <label for="tipo" class="block text-gray-700">Tipo de Evento</label>
                <select name="tipo" id="tipo" class="w-full p-2 border rounded" required>
                    <option value="carrera">Carrera</option>
                    <option value="todos">Todos</option>
                </select>
            </div>

            <!-- Campo: Ubicación -->
            <div class="mb-4">
                <label for="ubicacion" class="block text-gray-700">Ubicación</label>
                <input type="text" name="ubicacion" id="ubicacion" class="w-full p-2 border rounded" required>
            </div>

            <!-- Campo: Fecha -->
            <div class="mb-4">
                <label for="fecha" class="block text-gray-700">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="w-full p-2 border rounded" required>
            </div>

            <!-- Campo: Hora -->
            <div class="mb-4">
                <label for="hora" class="block text-gray-700">Hora</label>
                <input type="time" name="hora" id="hora" class="w-full p-2 border rounded" required>
            </div>

            <!-- Campo: Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="w-full p-2 border rounded" required></textarea>
            </div>

            <!-- Campo: Subir Afiche -->
            <div class="mb-4">
                <label for="afiche" class="block text-gray-700">Subir Afiche</label>
                <input type="file" name="afiche" id="afiche" class="w-full p-2 border">
            </div>

            <!-- Botones para Guardar o Cancelar -->
            <div class="flex gap-4">
                <button type="submit"
                    class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Guardar</button>
                <a href="{{ route('creacion-evento') }}"
                    class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
