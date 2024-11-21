<?php

use App\Http\Controllers\EstudianteController;
use App\Livewire\Admin\RoleMain;
use App\Livewire\Solicitud\SolicitudMain;
use App\Models\Estudiante;
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
});
