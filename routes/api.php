<?php

use App\Http\Controllers\EventoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('eventos',[EventoController::class,'index']);
Route::post('eventos',[EventoController::class,'store']);
Route::put('eventos/{evento}',[EventoController::class,'update']);
Route::get('eventos/{evento}',[EventoController::class,'show']);
Route::delete('eventos/{evento}',[EventoController::class,'destroy']);
