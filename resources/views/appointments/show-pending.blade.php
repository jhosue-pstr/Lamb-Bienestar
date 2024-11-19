@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
                <h1 class="h2">Detalles de la Cita</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4 row">
                                <div class="col-md-4">
                                    <div class="mb-4 text-center">
                                        <div class="avatar-placeholder bg-secondary rounded-circle" style="width: 150px; height: 150px; margin: auto;">
                                            <i class="text-white fas fa-user fa-5x" style="line-height: 150px;"></i>
                                        </div>
                                        <div class="mt-2">{{ auth()->user()->student_code }}</div>
                                    </div>
                                    <div class="student-info">
                                        <input type="text" class="mb-2 form-control" value="{{ auth()->user()->name }}" readonly>
                                        <input type="text" class="mb-2 form-control" value="{{ auth()->user()->last_name }}" readonly>
                                        <input type="text" class="mb-2 form-control" value="{{ auth()->user()->dni }}" readonly>
                                        <input type="text" class="mb-2 form-control" value="{{ auth()->user()->gender }}" readonly>
                                        <input type="text" class="mb-2 form-control" value="{{ auth()->user()->school }}" readonly>
                                        <input type="text" class="mb-2 form-control" value="{{ auth()->user()->faculty }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="appointment-details">
                                        <div class="mb-3 form-group">
                                            <input type="text" class="form-control" value="{{ $appointment->staff_name }}" readonly placeholder="Nombre Encargad@">
                                        </div>
                                        <div class="mb-3 form-group">
                                            <input type="text" class="form-control" value="{{ $appointment->area }}" readonly placeholder="Área">
                                        </div>
                                        <div class="mb-3 form-group">
                                            <input type="text" class="form-control" value="{{ $appointment->location }}" readonly placeholder="Lugar">
                                        </div>
                                        <div class="mb-3 form-group">
                                            <input type="text" class="form-control" value="{{ $appointment->scheduled_date->format('d/m/Y H:i') }}" readonly placeholder="Fecha / Hora">
                                        </div>
                                        <div class="mb-3 form-group">
                                            <input type="text" class="form-control" value="{{ $appointment->reason }}" readonly placeholder="Motivo">
                                        </div>
                                        <div class="mb-3 form-group">
                                            <input type="text" class="form-control" value="{{ $appointment->initiative }}" readonly placeholder="Derivación / Iniciativa">
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <div class="alert alert-warning" role="alert">
                                            <h4 class="alert-heading">NO OLVIDES TU CITA</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
