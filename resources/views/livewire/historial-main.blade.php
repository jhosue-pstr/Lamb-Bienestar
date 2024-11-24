<div class="flex">
    <!-- Información del Estudiante -->
    <div class="w-1/2 p-4 border-r border-gray-300">
        <h2 class="mb-4 text-xl font-semibold">Información del Estudiante</h2>
        <p><strong>Código:</strong> {{ $estudiante->codigo }}</p>
        <p><strong>Nombre:</strong> {{ $estudiante->nombre }} {{ $estudiante->apellidoPaterno }} {{ $estudiante->apellidoMaterno }}</p>
        <p><strong>DNI:</strong> {{ $estudiante->dni }}</p>
        <p><strong>Escuela:</strong> {{ $estudiante->escuela }}</p>
        <p><strong>Facultad:</strong> {{ $estudiante->facultad }}</p>
    </div>

    <!-- Citas del Estudiante -->
    <div class="w-1/2 p-4">
        <h2 class="mb-4 text-xl font-semibold">Citas del Estudiante</h2>

        @foreach ($citas as $cita)
            <div class="pb-4 mb-4 border-b">
                <p><strong>ID:</strong> {{ $cita->id }}</p>
                <p><strong>Área:</strong> {{ $cita->area }}</p>
                <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
                <p><strong>Hora:</strong> {{ $cita->hora }}</p>
                <p><strong>Estado:</strong> {{ $cita->estado }}</p>
                <button wire:click="showCitaDetails({{ $cita->id }})" class="px-4 py-2 text-white bg-blue-500 rounded">Más Información</button>
            </div>
        @endforeach
    </div>
</div>
