<div class="min-h-screen bg-gray-100 py-10">
    <!-- Encabezado -->
    <div class="container mx-auto px-6 mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Mis Solicitudes de Becas y Descuentos</h1>
        <p class="text-gray-600 mt-1">Seguimiento de becas y descuentos postulados</p>
    </div>

    <!-- Contenedor principal -->
    <div class="container mx-auto px-6 py-8 bg-white rounded-lg shadow-xl">
        <!-- Filtros y Botones -->
        <div class="flex justify-between items-center mb-8">
            <!-- Filtros -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Selector de semestre -->
                <div>
                    <label for="semestre" class="block text-sm font-medium text-gray-700">Semestre</label>
                    <select id="semestre" wire:model="selectedSemester" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar</option>
                        <option value="2024-1">Regular 2024-1</option>
                        <option value="2024-2">Regular 2024-2</option>
                    </select>
                </div>

                <!-- Selector de programa -->
                <div>
                    <label for="programa" class="block text-sm font-medium text-gray-700">Programa</label>
                    <select id="programa" wire:model="selectedProgram" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar</option>
                        <option value="sistemas">Ingeniería de Sistemas</option>
                        <option value="civil">Ingeniería Civil</option>
                    </select>
                </div>

                <!-- Selector de estado -->
                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select id="estado" wire:model="selectedStatus" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="aprobado">Aprobado</option>
                        <option value="rechazado">Rechazado</option>
                    </select>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex space-x-4">
                <button class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-4 py-2 rounded-lg shadow-md hover:scale-105 transform transition">
                    Buscar
                </button>
                <button wire:click="toggleCreateForm"
                        class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:scale-105 transform transition">
                    Crear Solicitud
                </button>
            </div>
        </div>

        <!-- Formulario de Crear Solicitud -->
        @if ($showCreateForm)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" wire:model="showCreateForm">
            <div class="bg-white rounded-lg shadow-lg w-1/2">
                <!-- Encabezado -->
                <div class="flex justify-between items-center bg-blue-700 text-white px-6 py-4 rounded-t-lg">
                    <h2 class="text-lg font-bold">APERTURAR BECA</h2>
                    <button wire:click="cancelCreateForm" class="text-white hover:text-gray-200">
                        &times;
                    </button>
                </div>

                <!-- Contenido del Formulario -->
                <div class="px-6 py-4">
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Selector de Plan -->
                        <div>
                            <label for="plan" class="block text-sm font-medium text-gray-700">Plan</label>
                            <select id="plan" wire:model="selectedPlan" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Seleccionar</option>
                                <option value="2023-1">2023-1</option>
                                <option value="2024-1">2024-1</option>
                            </select>
                        </div>

                        <!-- Selector de Campus -->
                        <div>
                            <label for="campus" class="block text-sm font-medium text-gray-700">Campus</label>
                            <select id="campus" wire:model="selectedCampus" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Seleccionar</option>
                                <option value="juliaca">Filial Juliaca</option>
                                <option value="lima">Filial Lima</option>
                            </select>
                        </div>

                        <!-- Selector de Programa -->
                        <div>
                            <label for="programa" class="block text-sm font-medium text-gray-700">Programa</label>
                            <select id="programa" wire:model="selectedProgram" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Seleccionar</option>
                                <option value="sistemas">EP Ingeniería de Sistemas</option>
                                <option value="civil">EP Ingeniería Civil</option>
                            </select>
                        </div>

                        <!-- Selector de Apertura Semestre Beca -->
                        <div>
                            <label for="semestre_beca" class="block text-sm font-medium text-gray-700">Apertura semestre beca</label>
                            <select id="semestre_beca" wire:model="selectedSemestreBeca" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Seleccionar</option>
                                <option value="2024-2">2024-2 Beca</option>
                                <option value="2025-1">2025-1 Beca Alimentos    </option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end bg-gray-100 px-6 py-4 rounded-b-lg">
                    <button wire:click="cancelCreateForm" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 mr-2">
                        Cancelar
                    </button>
                    <button wire:click="storeSolicitud" class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-4 py-2 rounded-lg hover:scale-105 transform transition">
                        Crear
                    </button>
                </div>
            </div>
        </div>

        @endif

        <!-- Tabla -->
        @if (!$showCreateForm)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">#</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Beca / Descuento</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Fecha de Registro</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Semestre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Plan</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Estado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Beca Excelencia Académica</td>
                            <td class="px-6 py-4">2023-11-24</td>
                            <td class="px-6 py-4">2024-1</td>
                            <td class="px-6 py-4">Plan Completo</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pendiente
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="#" class="text-blue-500 hover:underline">Ver Detalle</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
