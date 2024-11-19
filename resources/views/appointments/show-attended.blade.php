@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <main class="col-md-12">
            <div class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
                <h1 class="h2">Historial de Citas</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cita</th>
                            <th>Fecha Programada</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th>Más Información</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $index => $appointment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $appointment->type }}</td>
                            <td>{{ $appointment->scheduled_date->format('d-m-y') }}</td>
                            <td>{{ $appointment->scheduled_date->format('H:i') }}</td>
                            <td>
                                @if($appointment->status === 'attended')
                                    <i class="fas fa-check-circle text-success"></i>
                                @elseif($appointment->status === 'pending')
                                    <i class="fas fa-clock text-warning"></i>
                                @else
                                    <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('appointments.show', $appointment) }}" class="btn btn-sm btn-info">Ver Detalles</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
