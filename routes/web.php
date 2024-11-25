<?php

use App\Http\Controllers\AtencionController;
use App\Livewire\Admin\RoleMain;
use App\Livewire\AtencionMain;
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
    Route::get('/atencion', AtencionMain::class)->name('atencioness');
    Route::get('/historial', HistorialMain::class)->name('historial');

    //Route::get('/atencion', AtencionMain::class)->name('atencioness');

    Route::get('/atencion/{estudiante_id}', [AtencionController::class, 'main'])->name('atencion.main');


});
