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
                        <option value="2024-2">2024-2</option>
                    </select>
                </div>

                <!-- Selector de Campus -->
                <div>
                    <label for="campus" class="block text-sm font-medium text-gray-700">Campus</label>
                    <select id="campus" wire:model="selectedCampus" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar</option>
                        <option value="juliaca">Filial Juliaca</option>
                    </select>
                </div>

                <!-- Selector de Programa -->
                <div>
                    <label for="programa" class="block text-sm font-medium text-gray-700">Programa</label>
                    <select id="programa" wire:model="selectedProgram" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar</option>
                        <option value="sistemas">EP Ingeniería de Sistemas</option>
                    </select>
                </div>

                <!-- Selector de Apertura Semestre Beca -->
                <div>
                    <label for="semestre_beca" class="block text-sm font-medium text-gray-700">Apertura semestre beca</label>
                    <select id="semestre_beca" wire:model="selectedSemestreBeca" class="mt-2 w-full px-4 py-2 border rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar</option>
                        <option value="2024-2">2024-2 Beca</option>
                        <option value="2025-1">2024-2 Beca Alimentos </option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botones -->
        <div class="flex justify-end bg-gray-100 px-6 py-4 rounded-b-lg">
            <button wire:click="cancelCreateForm" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 mr-2">
                Cancelar
            </button>
            <button wire:click="redirectToBeca"
                class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-4 py-2 rounded-lg hover:scale-105 transform transition">
                          Crear
            </button>

        </div>
    </div>
</div>
@endif
