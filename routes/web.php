<?php

use App\Http\Controllers\EstudianteController;
use App\Livewire\Admin\RoleMain;
use App\Livewire\Beca\BecaAlimento;
use App\Livewire\Beca\BecaSeleccion;
use App\Livewire\Solicitud\GestionSolicitud;
use App\Livewire\Solicitud\SolicitudMain;
use App\Models\Beca;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // routes/web.php
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth']);


    Route::get('/Roles', RoleMain::class)->name('Roles');
    Route::get('/Solicitudes', SolicitudMain::class)->name('Solicitudes');
    Route::get('/estudiantes', [EstudianteController::class, 'index']);
    Route::get('/becas', BecaSeleccion::class)->name('beca.seleccion');
    Route::get('/becasali', BecaAlimento::class)->name('beca.alimento');
    Route::get('/gestion', GestionSolicitud::class)->name('gestion.solicitud');
    Route::get('/beca-general', BecaSeleccion::class)->name('livewire.becas.beca-seleccion');
    Route::get('/beca-alimento', BecaAlimento::class)->name('livewire.becas.beca-alimento');
    Route::get('/gestion/{tipoBeca}', GestionSolicitud::class)->name('gestion.solicitud');



});
