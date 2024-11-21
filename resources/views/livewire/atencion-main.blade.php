<!-- livewire.atencion-main.blade.php -->
<x-app-layout>
    <div class="py-12">
    <h3>Atenciones Anteriores de {{ $estudiante->nombre }}</h3>

    @if($atenciones->isEmpty())
        <p>No hay atenciones registradas para este estudiante.</p>
    @else
        @foreach($atenciones as $atencion)
            <div class="mt-2 card">
                <div class="card-body">
                    <p>{{ $atencion->descripcion }}</p>
                    <p><strong>Fecha:</strong> {{ $atencion->created_at }}</p>
                </div>
            </div>
        @endforeach

        <!-- Agregar controles de paginación -->
        <div class="mt-3">
            {{ $atenciones->links() }}
        </div>
    @endif
    </div>
</x-app-layout>


        {{-- <!-- Formulario para crear una nueva atención -->
        <form action="{{ route('atencion.store') }}" method="POST">
            @csrf
            <input type="hidden" name="estudiante_id" value="{{ $estudiante->id }}">

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción de la atención</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Atención</button>
        </form> --}}

