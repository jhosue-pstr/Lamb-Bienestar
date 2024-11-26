<x-app-layout>
    <div class="container py-10 mx-auto">
        <h2 class="mb-6 text-3xl font-extrabold text-green-500">Crear un nuevo evento</h2>

        <form action="{{ route('guardar-evento') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Campo: Nombre del evento -->
            <div class="mb-4">
                <label for="nombre" class="block font-bold text-green-500">Nombre del Evento</label>
                <input type="text" name="nombre" id="nombre" class="w-full p-2 font-bold text-black border rounded" required>
            </div>

            <!-- Campo: Tipo del evento -->
            <div class="mb-4">
                <label for="tipo" class="block font-bold text-green-500">Tipo de Evento</label>
                <select name="tipo" id="tipo" class="w-full p-2 font-bold text-black bg-white border rounded" required>
                    <option value="carrera" class="font-bold text-black bg-gray-200">Carrera</option>
                    <option value="todos" class="font-bold text-black bg-gray-200">Todos</option>
                </select>
            </div>

            <!-- Campo: Ubicación -->
            <div class="mb-4">
                <label for="ubicacion" class="block font-bold text-green-500">Ubicación</label>
                <input type="text" name="ubicacion" id="ubicacion" class="w-full p-2 font-bold text-black border rounded" required>
            </div>

            <!-- Campo: Fecha -->
            <div class="mb-4">
                <label for="fecha" class="block font-bold text-green-500">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="w-full p-2 font-bold text-black border rounded" required>
            </div>

            <!-- Campo: Hora -->
            <div class="mb-4">
                <label for="hora" class="block font-bold text-green-500">Hora</label>
                <input type="time" name="hora" id="hora" class="w-full p-2 font-bold text-black border rounded" required>
            </div>

            <!-- Campo: Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block font-bold text-green-500">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="w-full p-2 font-bold text-black border rounded" required></textarea>
            </div>

            <!-- Campo: Subir Afiche -->
            <div class="mb-4">
                <label for="afiche" class="block font-bold text-green-500">Subir Afiche</label>
                <input type="file" name="afiche" id="afiche" class="w-full p-2 font-bold text-black border rounded">
            </div>

            <!-- Botones para Guardar o Cancelar -->
            <div class="flex gap-4">
                <button type="submit" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Guardar</button>
                <a href="{{ route('creacion-evento') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
