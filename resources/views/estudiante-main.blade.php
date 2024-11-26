@inject('carbon', 'Carbon\Carbon')

<div class="py-2">
    <!-- Título principal -->

    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="px-4 py-4 overflow-hidden shadow-xl sm:rounded-lg dark:bg-gray-800/50 dark:bg-gradient-to-bl">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <!-- Parte izquierda: Información del Estudiante -->
                <div class="p-4 mb-4 rounded-md shadow-md">
                    @if ($estudiante)
                        <div class="flex items-center space-x-4">
                            <img src="{{ $estudiante->foto ?? '/path/to/default-avatar.jpg' }}" alt="Foto del estudiante"
                                class="w-20 h-20 rounded-full">
                            <div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">Código</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value="{{ $estudiante->codigo ?? 'No disponible' }}" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">Nombre</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value=" {{ $estudiante->nombre ?? 'No disponible' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">Apellidos</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value="{{ $estudiante->apellidoPaterno ?? '' }} {{ $estudiante->apellidoMaterno ?? '' }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">DNI</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value=" {{ $estudiante->dni ?? 'No disponible' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">Escuela</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value="  {{ $estudiante->escuela ?? 'No disponible' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">Facultad</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value=" {{ $estudiante->facultad ?? 'No disponible' }}" readonly>
                                    </div>
                                </div>




                            </div>
                        </div>
                    @else
                        <p>No se encontró información del estudiante.</p>
                    @endif
                </div>

                <!-- Parte derecha: Citas del Estudiante -->
                <div class="p-4rounded-md">
                    <h3 class="text-lg font-semibold">Citas del Estudiante</h3>

                    @if ($citas && $citas->count())
                        @foreach ($citas as $cita)
                            <div class="p-4 mb-4 rounded-md shadow-md">
                                <div class="flex justify-between">

                                    <div>


                                        <div class="container-fluid">
                                            <div class="row">
                                                <!-- Columna 1: Imagen del Evento -->
                                                <div class="col-6 ">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="AdminName" class="bmd-label-floating">ID</label>
                                                            <input type="text" class="form-control bg-transparent"
                                                                id="AdminName" value=" {{ $cita->id }}" readonly>
                                                        </div>

                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="AdminName"
                                                                class="bmd-label-floating">Fecha</label>
                                                            <input type="text" class="form-control bg-transparent"
                                                                id="AdminName"
                                                                value=" {{ $carbon::parse($cita->fecha)->format('d/m/Y') }}"
                                                                readonly>
                                                        </div>

                                                    </div>
                                                </div>

                                                <!-- Columna 2: Formulario del Evento -->
                                                <div class="col-6 ">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="AdminName"
                                                                class="bmd-label-floating">Area</label>
                                                            <input type="text" class="form-control bg-transparent"
                                                                id="AdminName" value="  {{ $cita->area }}" readonly>
                                                        </div>

                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="AdminName"
                                                                class="bmd-label-floating">Hora</label>
                                                            <input type="text" class="form-control bg-transparent"
                                                                id="AdminName"
                                                                value="{{ $carbon::parse($cita->hora)->format('H:i') }}"
                                                                readonly>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Estado y íconos -->
                                        <div class="flex items-center mt-2 space-x-2">
                                            @if ($cita->estado == 'asistio')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500"
                                                    fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                    <path d="M10 2l3 6h6l-4 4 1 6-5-3-5 3 1-6-4-4h6l3-6z" />
                                                </svg>
                                                <p class="text-green-500">Asistió</p>
                                            @elseif ($cita->estado == 'pendiente')
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5 text-yellow-500" fill="currentColor"
                                                    viewBox="0 0 20 20" aria-hidden="true">
                                                    <path d="M10 2a8 8 0 11-8 8 8 8 0 018-8zM9 5v6h2V5H9z" />
                                                </svg>
                                                <p class="text-yellow-500">Pendiente</p>
                                            @elseif ($cita->estado == 'no asistio')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500"
                                                    fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-7h2v2h-2v-2zm0-4h2v2h-2V7z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <p class="text-red-500">No asistió</p>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="{{ route('cita.detalle', $cita->id) }}">
                                        <x-button sm primary label="Más Información" class="text-black" />
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        <div class="mt-4">
                            {{ $citas->links() }} <!-- Paginación -->
                        </div>
                    @else
                        <p>No tienes citas registradas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
