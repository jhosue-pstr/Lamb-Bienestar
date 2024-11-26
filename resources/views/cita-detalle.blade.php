@inject('carbon', 'Carbon\Carbon')

<div class="py-4">
    <div class="flex items-center justify-between mb-4">
        <!-- Botón Regresar -->


        <!-- Título -->
        <div>
            <h2 class="text-3xl font-bold text-white">Detalles de la Cita</h2>
            <div class="mt-2 border-b-2 border-info-600 w-60"></div>
        </div>
        <div class="flex items-center">
            <a href="{{ route('historial') }}" class="flex items-center text-info-600 hover:text-info-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Regresar
            </a>
        </div>
    </div>


    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="px-4 py-4 overflow-hiddenshadow-xl sm:rounded-lg dark:bg-gray-800/50 dark:bg-gradient-to-bl">

            <!-- Información de la Cita -->
            <div class=" shadow-md rounded-md p-4 mb-4 form-neon" autocomplete="off">
                <h3 class="text-xl font-semibold">Información de la Cita</h3>
                <div class="full-box page-header">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Columna 1: Imagen del Evento -->
                            <div class="col-4 ">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">ID</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value="{{ $cita->id }}" readonly>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value="{{ $carbon::parse($cita->fecha)->format('d/m/Y') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna 2: Formulario del Evento -->
                            <div class="col-4 ">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">Area</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value="{{ $cita->area }}" readonly>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">Hora</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value=" {{ $carbon::parse($cita->hora)->format('H:i') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 ">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="AdminName" class="bmd-label-floating">Motivo</label>
                                        <input type="text" class="form-control bg-transparent" id="AdminName"
                                            value="{{ $cita->motivo }}" readonly>
                                    </div>
                                </div>
                                <p><strong>Estado:</strong>
                                    @if ($cita->estado == 'asistio')
                                        <span class="text-green-500">✔ Asistió</span>
                                    @elseif ($cita->estado == 'pendiente')
                                        <span class="text-yellow-500">⌛ Pendiente</span>
                                    @elseif ($cita->estado == 'no asistio')
                                        <span class="text-red-500">❌ No asistió</span>
                                    @endif
                                </p>
                                <div>
                                    <!-- Verifica si la cita está en estado "asistió" -->
                                    @if ($cita->estado == 'asistio')
                                        <div>
                                            <p class="text-green-500">Gracias por asistir. Califica tu experiencia:</p>

                                            <!-- Formulario para calificación -->
                                            <div class="mt-4">
                                                <label for="calificacion" class="block">Calificación (1 a 5):</label>
                                                <input type="number" wire:model="calificacion" id="calificacion"
                                                    min="1" max="5" class="w-20 p-2 border rounded">

                                                <label for="comentario" class="block mt-2">Comentario
                                                    (Opcional):</label>
                                                <textarea wire:model="comentario" id="comentario" class="w-full p-2 border rounded" rows="4"></textarea>

                                                <x-button sm primary label="Enviar" wire:click="guardarCalificacion"
                                                    class="mt-4" />
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Mensaje de éxito -->
                                    @if (session()->has('message'))
                                        <div class="mt-4 text-green-500">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <!-- Información del Estudiante -->
                <div class=" shadow-md rounded-md p-4 form-neon">
                    <h3 class="text-xl font-semibold">Información del Estudiante</h3>

                    <div class="full-box page-header">
                        <div class="container-fluid">
                            <img src="{{ $estudiante->foto ?? '/path/to/default-avatar.jpg' }}"
                                alt="Foto del estudiante" class="w-20 h-20 rounded-full">
                            <div class="row">
                                <!-- Columna 1: Imagen del Evento -->
                                <div class="col-3 ">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="AdminName" class="bmd-label-floating">Código</label>
                                            <input type="text" class="form-control bg-transparent" id="AdminName"
                                                value="{{ $estudiante->codigo ?? 'No disponible' }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="AdminName" class="bmd-label-floating">Escuela</label>
                                            <input type="text" class="form-control bg-transparent" id="AdminName"
                                                value="  {{ $estudiante->escuela ?? 'No disponible' }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <!-- Columna 2: Formulario del Evento -->
                                <div class="col-3 ">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="AdminName" class="bmd-label-floating">Nombre</label>
                                            <input type="text" class="form-control bg-transparent" id="AdminName"
                                                value=" {{ $estudiante->nombre ?? 'No disponible' }}" readonly>
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
                                <div class="col-3 ">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="AdminName" class="bmd-label-floating">Apellidos</label>
                                            <input type="text" class="form-control bg-transparent" id="AdminName"
                                                value="{{ $estudiante->apellidoPaterno ?? '' }} {{ $estudiante->apellidoMaterno ?? '' }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 ">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="AdminName" class="bmd-label-floating">DNI</label>
                                            <input type="text" class="form-control bg-transparent" id="AdminName"
                                                value=" {{ $estudiante->dni ?? 'No disponible' }}" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">

                        <div>









                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
