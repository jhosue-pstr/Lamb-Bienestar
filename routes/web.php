<?php

use App\Livewire\Admin\RoleMain;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EventosAnunciosController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\RecordatorioController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas por middleware de autenticación
Route::middleware(['auth:sanctum', config('jetstream.auth_session')])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para la gestión de roles con Livewire
    Route::get('/Roles', RoleMain::class)->name('Roles');
});
// Rutas para eventos y anuncios
Route::get('/eventos-anuncios', [EventosAnunciosController::class, 'index'])->name('eventos-anuncios');
Route::get('/mas-informacion', [InformacionController::class, 'index'])->name('mas-informacion');
Route::get('/api/eventos/{tipo}', [InformacionController::class, 'getEventosByTipo']);
Route::get('/api/evento/{id}', [InformacionController::class, 'getEventoById']);

// Rutas para API de eventos
Route::get('/api/eventos/{tipo}', [EventoController::class, 'getEventosByTipo']);
Route::get('/api/evento/{id}', [EventoController::class, 'getEventoById']);
Route::post('/api/evento/{id}', [EventoController::class, 'getDetallesEvento']);


// Rutas para RecordatoriosRoute::get('/api/anuncio/{id}', [AnuncioController::class, 'show']);

Route::post('/recordatorio', [RecordatorioController::class, 'store']);
Route::get('/api/recordatorio', [RecordatorioController::class, 'getLatest']);
Route::get('/api/anuncio-json/{id}', [AnuncioController::class, 'getAnuncioJson']);

// Vistas estáticas
Route::get('/anuncios', function () {
    return view('anuncios');
})->name('anuncios');
Route::get('/mas-informacion2', function () {
    return view('mas-informacion2');
})->name('mas-informacion2');

Route::get('/citas', function () {
    return view('citas');
})->name('citas');
// Rutas para creación y gestión de eventos
Route::get('/anuncios', [AnuncioController::class, 'anuncios'])->name('anuncios.index');


Route::get('/api/anuncio/{id}', [AnuncioController::class, 'show']);
Route::get('/mas-informacion2', [AnuncioController::class, 'masInformacion2'])->name('mas-informacion2');



Route::middleware(['auth'])->group(function () {
    // Vista para la lista de eventos y botón para crear uno nuevo
    Route::get('/creacion-evento', [EventoController::class, 'index'])->name('creacion-evento');

    // Vista para ingresar detalles de un nuevo evento
    Route::get('/creacion-evento-detalles', [EventoController::class, 'create'])->name('creacion-evento-detalles');

    // Ruta para guardar un nuevo evento
    Route::post('/guardar-evento', [EventoController::class, 'store'])->name('guardar-evento');

    // Ruta para ver los detalles de un evento específico
    Route::get('/evento/{id}', [EventoController::class, 'show'])->name('evento-detalle');

    Route::delete('/eliminar-evento/{id}', [EventoController::class, 'destroy'])->name('eliminar-evento');


    Route::get('/editar-evento/{id}', [EventoController::class, 'edit'])->name('editar-evento');
    Route::put('/actualizar-evento/{id}', [EventoController::class, 'update'])->name('actualizar-evento');



});

// Rutas para gestión de anuncios
Route::middleware(['auth'])->group(function () {
    // Ruta para la vista principal de anuncios (similar a la de eventos)
    Route::get('/creacion-anuncio', [AnuncioController::class, 'index'])->name('creacion-anuncio');

    // Vista para ingresar detalles de un nuevo anuncio
    Route::get('/creacion-anuncio-detalles', [AnuncioController::class, 'create'])->name('creacion-anuncio-detalles');

    // Ruta para guardar un nuevo anuncio
    Route::post('/guardar-anuncio', [AnuncioController::class, 'store'])->name('guardar-anuncio');

    // Ruta para ver los detalles de un anuncio específico
    Route::get('/anuncio/{id}', [AnuncioController::class, 'show'])->name('anuncio-detalle');

    // Ruta para editar un anuncio
    Route::get('/editar-anuncio/{id}', [AnuncioController::class, 'edit'])->name('editar-anuncio');

    // Ruta para actualizar un anuncio
    Route::put('/actualizar-anuncio/{id}', [AnuncioController::class, 'update'])->name('actualizar-anuncio');

    // Ruta para eliminar un anuncio
    Route::delete('/eliminar-anuncio/{id}', [AnuncioController::class, 'destroy'])->name('eliminar-anuncio');
});




Route::get('/crear-citas', [CitaController::class, 'index']);
Route::get('/crear-citas/buscar-estudiante', [CitaController::class, 'buscarEstudiante']);
Route::post('/crear-citas/guardar-cita', [CitaController::class, 'guardarCita']);
Route::get('/crear-citas/obtener-citas', [CitaController::class, 'obtenerCitas']);
