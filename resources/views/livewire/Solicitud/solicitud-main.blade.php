<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Solicitudes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto px-4 py-6">
        <!-- Título y subtítulo -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Mis solicitudes de Chequeo Medico, Alimentacion y Becas</h1>
                <p class="text-sm text-gray-600">Seguimiento de solicitudes</p>
            </div>
        </div>

        <!-- Filtros -->
        <div class="flex flex-wrap items-center gap-4 my-6">
            <select class="flex-grow bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-800">
                <option value="2024-2">Regular 2024-2</option>
            </select>
            <select class="flex-grow bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-800">
                <option value="">Seleccione programa</option>
            </select>
            <select class="flex-grow bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-800">
                <option value="">Seleccione estado</option>
            </select>
            <button class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600">BUSCAR</button>
            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">CREAR SOLICITUD</button>
        </div>

        <!-- Tabla -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-green-400 text-gray-800">
                    <tr>
                        <th class="py-1 px-4 text-left">#</th>
                        <th class="py-1 px-4 text-left">Beca / Descuento</th>
                        <th class="py-1 px-4 text-left">Fecha de registro</th>
                        <th class="py-1 px-4 text-left">Semestre</th>
                        <th class="py-1 px-4 text-left">Plan</th>
                        <th class="py-1 px-4 text-left">Plan programa</th>
                        <th class="py-1 px-4 text-left">Estado</th>
                        <th class="py-1 px-4 text-center">Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">1</td>
                        <td class="py-3 px-4">Descuento por Asociado de la Promotora</td>
                        <td class="py-3 px-4">12/08/24</td>
                        <td class="py-3 px-4">Regular 2024-2</td>
                        <td class="py-3 px-4">2023-1</td>
                        <td class="py-3 px-4">Ingeniería de Sistemas, Presencial</td>
                        <td class="py-3 px-4">
                            <span class="text-green-600 font-bold">&#10003;</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <button class="text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m4 0H9m4 0H9m4 0H9m4 0H9m4 0H9m4 0H9m4 0H9m4 0H9m4 0H9m4 0H9m4 0H9m4 0H9" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
