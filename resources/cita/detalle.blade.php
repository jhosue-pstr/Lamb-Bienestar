<!-- resources/views/cita/detalle.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Cita</title>
</head>
<body>
    <h1>Detalle de la Cita</h1>

    <p><strong>ID:</strong> {{ $cita->id }}</p>
    <p><strong>Área:</strong> {{ $cita->area }}</p>
    <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
    <p><strong>Hora:</strong> {{ $cita->hora }}</p>
    <p><strong>Estado:</strong> {{ $cita->estado }}</p>

    <!-- Mostrar mensaje basado en el estado de la cita -->
    @if($cita->estado == 'pendiente')
        <p>No olvides tu cita!</p>
    @elseif($cita->estado == 'confirmada')
        <p>Tu cita está confirmada.</p>
    @elseif($cita->estado == 'cancelada')
        <p>La cita ha sido cancelada.</p>
    @endif

</body>
</html>
