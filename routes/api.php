<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\RecordatorioController;

use App\Http\Controllers\EventoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('anuncios', [AnuncioController::class, 'indexApi']);
Route::post('anuncios', [AnuncioController::class, 'storeApi']);
Route::get('anuncios/{id}', [AnuncioController::class, 'showApi']);
Route::put('anuncios/{id}', [AnuncioController::class, 'updateApi']);
Route::delete('anuncios/{id}', [AnuncioController::class, 'destroyApi']);



Route::get('recordatorios', [RecordatorioController::class, 'index']); // Obtener todos los recordatorios
Route::post('recordatorios', [RecordatorioController::class, 'store']); // Crear un nuevo recordatorio
Route::get('recordatorios/{recordatorio}', [RecordatorioController::class, 'show']); // Obtener un recordatorio específico
Route::put('recordatorios/{recordatorio}', [RecordatorioController::class, 'update']); // Actualizar un recordatorio
Route::delete('recordatorios/{recordatorio}', [RecordatorioController::class, 'destroy']); // Eliminar un recordatorio
Route::get('recordatorios/ultimo', [RecordatorioController::class, 'ultimoRecordatorio']); // Obtener el último recordatorio
Route::get('recordatorios/latest', [RecordatorioController::class, 'getLatest']); // Obtener el último recordatorio con formato personalizado
