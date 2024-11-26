<x-app-layout>
    <div class="py-12">

        <div class="flex justify-start mb-4">
            <a href="{{ route('historial') }}" <!-- Aquí va el SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Regresar
            </a>
        </div>


        <div class="container-fluid">
            <ul class="full-box list-unstyled page-nav-tabs">

                <li>
                    <a class="active"><i class="fas fa-users fa-fw"></i> &nbsp; Atenciones de
                        {{ $estudiante->nombre }}</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-dark table-sm">
                <thead>
                    <tr class="text-center roboto-medium">
                        <th>Motivo</th>
                        <th>Tipo</th>
                        <th>Responsable</th>
                        <th>Fecha de Atención</th>
                        <th>Lleda por</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($atenciones as $atencion)
                        @if ($expandedAtencionId == $atencion->id)
                            <form action="" class="form-neon" autocomplete="off">
                                <fieldset>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <!-- Motivo -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="motivo_atencion" class="bmd-label-floating">Motivo:
                                                        {{ $atencion->motivoAtencion }}</label>
                                                    <input type="text" name="motivo_atencion" class="form-control"
                                                        id="motivo_atencion" maxlength="20"
                                                        value="{{ $atencion->motivoAtencion }}" pattern="[0-9]{1,20}">
                                                </div>
                                            </div>

                                            <!-- Tipo -->
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="tipo" class="bmd-label-floating">Tipo:
                                                    </label>
                                                    <input type="text" name="tipo" class="form-control"
                                                        id="tipo" maxlength="25" value="{{ $atencion->tipo }}"
                                                        pattern="[a-zA-Z ]{1,25}">
                                                </div>
                                            </div>

                                            <!-- Responsable -->
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="responsable" class="bmd-label-floating">Responsable:
                                                    </label>
                                                    <input type="text" name="responsable" class="form-control"
                                                        id="responsable" maxlength="25"
                                                        value="{{ $atencion->responsable }}" pattern="[a-zA-Z ]{1,25}">
                                                </div>
                                            </div>

                                            <!-- Estado -->
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="estado" class="bmd-label-floating">lleda por:
                                                    </label>
                                                    <input type="text" name="estado" class="form-control"
                                                        id="estado" maxlength="25"
                                                        value="{{ $atencion->derivacion }}" pattern="[a-zA-Z ]{1,25}">
                                                </div>
                                            </div>

                                            <!-- Observaciones -->
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="observaciones" class="bmd-label-floating">Observaciones:
                                                        {{ $atencion->observaciones }}</label>
                                                    <input type="text" name="observaciones" class="form-control"
                                                        id="observaciones" maxlength="25"
                                                        value="{{ $atencion->lesionObservaciones }}"
                                                        pattern="[a-zA-Z ]{1,25}">
                                                </div>
                                            </div>

                                            <!-- Otros Datos -->
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="otros_datos" class="bmd-label-floating">Otros Datos:
                                                        {{ $atencion->otros_datos }}</label>
                                                    <input type="text" name="otros_datos" class="form-control"
                                                        id="otros_datos" maxlength="25"
                                                        value="{{ $atencion->otrosDatos }}" pattern="[a-zA-Z ]{1,25}">
                                                </div>
                                            </div>
                                            <div class="px-2 py-1">
                                                <a href="{{ route('atencion.main', ['estudiante_id' => $estudiante->id]) }}"
                                                    class="px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700">
                                                    Ocultar Detalles
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        @else
                        @endif
                        <tr class="text-center">
                            <td>{{ $atencion->motivoAtencion ?? 'No disponible' }}</td>
                            <td>{{ $atencion->tipo ?? 'No disponible' }}</td>
                            <td>{{ $atencion->responsable ?? 'No disponible' }}</td>
                            <td>{{ $atencion->fechaAtencion ?? 'No disponible' }}</td>
                            <td>{{ $atencion->derivacion ?? 'No disponible' }}</td>
                            <td>
                                <a href="{{ route('atencion.main', ['estudiante_id' => $estudiante->id, 'expanded_atencion' => $atencion->id, 'page' => $atenciones->currentPage()]) }}"
                                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                    Ver Detalles
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Si no hay atenciones -->
        <div class="mt-2">
            @if (!$atenciones->count())
                <x-alert title="* No existen atenciones para este estudiante" info />
            @endif
        </div>

        <!-- Paginación -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $atenciones->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $atenciones->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
                @for ($i = 1; $i <= $atenciones->lastPage(); $i++)
                    <li class="page-item {{ $i == $atenciones->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $atenciones->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $atenciones->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $atenciones->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</x-app-layout>
