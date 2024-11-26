<div class="container-fluid">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">

    <!-- Filtro por Área -->
    <div class="row mb-4 align-items-end">
        <div class="col-md-3">
            <label for="area" class="form-label text-white">Filtrar por Área:</label>
            <select id="area" wire:model="area" class="form-select bg-transparent form-neon rounded-full">
                <option value="">Selecciona un Área</option>
                @foreach ($areas as $areaOption)
                    <option value="{{ $areaOption }}">{{ $areaOption }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <button wire:click="filtrarCitas" class="btn btn-primary w-100">
                Filtrar
            </button>
        </div>
    </div>

    <!-- Tabla de Citas -->
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>Estudiante</th>
                    <th>Área</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($citas as $cita)
                    <tr class="text-center">
                        <td>{{ $cita->id }}</td>
                        <td>{{ $cita->estudiante->nombre ?? 'Sin asignar' }}</td>
                        <td>{{ $cita->area }}</td>
                        <td>{{ $cita->motivo }}</td>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $cita->estado }}</td>
                        <td>
                            <button wire:click="editarCita({{ $cita->id }})"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Editar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay citas registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal para editar cita -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Editar Cita
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" wire:submit.prevent="guardarCita">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                Estudiante</label>
                            <input type="text" id="name" wire:model="cita.estudiante.nombre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre del estudiante" readonly>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="area"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Área</label>
                            <input type="text" id="area" wire:model="cita.area"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Área" readonly>
                        </div>
                        <div class="col-span-2">
                            <label for="motivo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivo</label>
                            <input type="text" id="motivo" wire:model="cita.motivo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Motivo de la cita" readonly>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="fecha"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
                            <input type="date" id="fecha" wire:model="fecha"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="hora"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hora</label>
                            <input type="time" id="hora" wire:model="hora"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="estado"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                            <select id="estado" wire:model="estado"
                                class="form-select bg-transparent form-neon rounded-full">
                                <option value="Asistió">Asistió</option>
                                <option value="No asistió">No asistió</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-600">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
