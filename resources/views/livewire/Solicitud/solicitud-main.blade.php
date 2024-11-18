<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Solicitudes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto px-4 py-6">
        <!-- Título -->
        <h1 class="text-2xl font-bold mb-4">Gestión de Solicitudes</h1>

        <!-- Botón para crear nueva solicitud -->
        <div class="flex justify-end mb-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Crear Nueva Solicitud
            </button>
        </div>

        <!-- Tabla de solicitudes -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Nombre</th>
                        <th class="py-3 px-4 text-left">Tipo</th>
                        <th class="py-3 px-4 text-left">Estado</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fila de ejemplo 1 -->
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">1</td>
                        <td class="py-3 px-4">Solicitud de Apoyo</td>
                        <td class="py-3 px-4">Educativo</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-lg text-white bg-yellow-500">Pendiente</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <!-- Botones de acción -->
                            <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Editar</button>
                            <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Fila de ejemplo 2 -->
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">2</td>
                        <td class="py-3 px-4">Solicitud de Recursos</td>
                        <td class="py-3 px-4">Financiero</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-lg text-white bg-green-500">Aprobada</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <!-- Botones de acción -->
                            <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Editar</button>
                            <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Fila de ejemplo 3 -->
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4">3</td>
                        <td class="py-3 px-4">Solicitud de Material</td>
                        <td class="py-3 px-4">Logística</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 rounded-lg text-white bg-red-500">Rechazada</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <!-- Botones de acción -->
                            <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Editar</button>
                            <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4 flex justify-end">
            <nav class="flex space-x-2">
                <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg hover:bg-gray-400">Anterior</button>
                <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg hover:bg-gray-400">1</button>
                <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg hover:bg-gray-400">2</button>
                <button class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg hover:bg-gray-400">Siguiente</button>
            </nav>
        </div>
    </div>

</body>
</html>
