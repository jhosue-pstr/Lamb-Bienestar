<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\EstudianteController;
use App\Livewire\Admin\RoleMain;
use App\Livewire\CitaDetalle;
use App\Livewire\EstudianteMain;
use App\Livewire\HistorialMain;
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
    Route::get('/historial', EstudianteMain::class)->name('Historial');
    Route::get('/cita/{id}', CitaDetalle::class)->name('cita.detalle');
});
