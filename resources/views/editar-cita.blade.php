<div class="container-fluid">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">

    <div class="container-fluid">
        <ul class="full-box list-unstyled page-nav-tabs">
            <li>
                <a href="productlist.html"><i class="fas fa-boxes fa-fw"></i> &nbsp; Registro de Citas</a>
            </li>
        </ul>
    </div>

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
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                    <tr class="text-center">
                        <td>{{ $cita->id }}</td>
                        <td>{{ $cita->estudiante->nombre ?? 'Sin asignar' }}</td>
                        <td>{{ $cita->area }}</td>
                        <td>{{ $cita->motivo }}</td>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>



                            <form class="max-w-sm mx-auto">
                                <select id="countries" wire:model="estados.{{ $cita->id }}"
                                    wire:change="actualizarEstado({{ $cita->id }})"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{ $cita->estado }}</option>
                                    <option value="Asistió" {{ $cita->estado == 'Asistió' ? 'selected' : '' }}>Asistió
                                    </option>
                                    <option value="No asistió" {{ $cita->estado == 'No asistió' ? 'selected' : '' }}>No
                                        asistió</option>
                                    <option value="Pendiente" {{ $cita->estado == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente</option>
                                </select>
                            </form>




                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
