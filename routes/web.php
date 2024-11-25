<?php

use App\Livewire\Admin\RoleMain;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\AtencionController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EventosAnunciosController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\RecordatorioController;
use App\Livewire\AtencionMain;
use App\Livewire\Beca\BecaAlimento;
use App\Livewire\Beca\BecaSeleccion;
use App\Livewire\CitaDetalle;
use App\Livewire\EstudianteMain;
use App\Livewire\HistorialMain;
use App\Livewire\Solicitud\GestionSolicitud;
use App\Livewire\Solicitud\SolicitudMain;
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
})->middleware(['auth'])->name('dashboard');


    Route::get('/Roles', RoleMain::class)->name('Roles');
    Route::get('/Atenciones', AtencionMain::class)->name('Atenciones');


Route::get('/ultima-cita', [CitaController::class, 'getUltimaCita']);

// Rutas para eventos y anuncios
Route::get('/eventos-anuncios', [EventosAnunciosController::class, 'index'])->name('eventos-anuncios');
Route::get('/mas-informacion', [InformacionController::class, 'index'])->name('mas-informacion');
Route::get('/api/eventos/{tipo}', [InformacionController::class, 'getEventosByTipo']);
Route::get('/api/evento/{id}', [InformacionController::class, 'getEventoById']);
Route::get('/api/eventos', [EventosAnunciosController::class, 'filtrarPorTipo']);

// Rutas para API de eventos
Route::get('/api/eventos/{tipo}', [EventoController::class, 'getEventosByTipo']);
Route::get('/api/evento/{id}', [EventoController::class, 'getEventoById']);
Route::post('/api/evento/{id}', [EventoController::class, 'getDetallesEvento']);


// Rutas para RecordatoriosRoute::get('/api/anuncio/{id}', [AnuncioController::class, 'show']);
Route::get('/mas-informacion/{id}', [EventosAnunciosController::class, 'mostrar'])->name('mas-informacion');

Route::post('/recordatorio', [RecordatorioController::class, 'store'])->name('recordatorio.store');
Route::get('/api/recordatorio', [RecordatorioController::class, 'getLatest'])->name('recordatorio.getLatest');
Route::get('/api/anuncio-json/{id}', [AnuncioController::class, 'getAnuncioJson']);

Route::get('/mas-informacion1', function () {
    return view('mas-informacion1');
})->name('mas-informacion1');

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
Route::get('/crear-citas', [CitaController::class, 'crear'])->name('crear-citas');

Route::get('/api/eventos', [EventosAnunciosController::class, 'filtrarPorTipo']);

Route::get('/api/anuncio/{id}', [AnuncioController::class, 'show']);
Route::get('/mas-informacion2/{id}', [AnuncioController::class, 'masInformacion2'])->name('mas-informacion2');



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


Route::get('/api/ultimo-recordatorio', [RecordatorioController::class, 'getLatest']);
Route::get('/api/ultima-cita', [CitaController::class, 'getUltimaCita']);








Route::get('/mas-informacion2/{id}', [AnuncioController::class, 'masInformacion2'])->name('mas-informacion2');





Route::prefix('crear-citas')->group(function () {
    Route::get('/', [CitaController::class, 'crear'])->name('crear-citas'); // Vista principal
    Route::get('/buscar-estudiante', [CitaController::class, 'buscarEstudiante']); // Buscar estudiante
    Route::post('/guardar-cita', [CitaController::class, 'guardarCita'])->name('guardar-cita'); // Guardar cita
    Route::get('/obtener-citas', [CitaController::class, 'obtenerCitas']); // Obtener citas para el calendario
});




Route::get('/Roles', RoleMain::class)->name('Roles');
    Route::get('/atencion', AtencionMain::class)->name('atencioness');
    Route::get('/historial2', HistorialMain::class)->name('historial');

    //Route::get('/atencion', AtencionMain::class)->name('atencioness');

    Route::get('/atencion/{estudiante_id}', [AtencionController::class, 'main'])->name('atencion.main');







Route::get('/historial', EstudianteMain::class)->name('Historial');
Route::get('/cita/{id}', CitaDetalle::class)->name('cita.detalle');





Route::get('/Solicitudes', SolicitudMain::class)->name('Solicitudes');
Route::get('/estudiantes', [EstudianteController::class, 'index']);
Route::get('/becas', BecaSeleccion::class)->name('beca.seleccion');
Route::get('/becasali', BecaAlimento::class)->name('beca.alimento');
Route::get('/gestion', GestionSolicitud::class)->name('gestion.solicitud');


});
