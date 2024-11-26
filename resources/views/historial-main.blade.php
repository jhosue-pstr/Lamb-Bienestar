<div class="container-fluid py-2">


    <div class="container-fluid">
        <ul class="full-box list-unstyled page-nav-tabs">

            <li>
                <a class="active"><i class="fas fa-users fa-fw"></i> &nbsp; Lista Estudiantes</a>

            </li>
        </ul>
    </div>


    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Facultad</th>
                    <th>Escuela</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historias as $historial)
                    <tr class="text-center">
                        <td>{{ $historial->estudiante->nombre ?? 'No disponible' }}</td>
                        <td>{{ $historial->estudiante->apellidoPaterno ?? 'No disponible' }}</td>
                        <td>{{ $historial->estudiante->facultad ?? 'No disponible' }}</td>
                        <td>{{ $historial->estudiante->escuela ?? 'No disponible' }}</td>
                        <td>{{ $historial->tipo ?? 'No disponible' }}</td>
                        <td>
                            <a href="{{ route('atencion.main', ['estudiante_id' => $historial->estudiante->id]) }}">
                                <button
                                    class="px-4 py-2 text-white transition-all duration-300 bg-blue-600 rounded-md hover:bg-blue-700">
                                    Ver Atenciones
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2">
        @if (!$historias->count())
            <x-alert title="* No existe ningún registro coincidente" info />
        @endif
    </div>



    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $historias->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $historias->previousPageUrl() }}" tabindex="-1">Previous</a>
            </li>

            @for ($i = 1; $i <= $historias->lastPage(); $i++)
                <li class="page-item {{ $i == $historias->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $historias->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <li class="page-item {{ $historias->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $historias->nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </nav>

</div>
