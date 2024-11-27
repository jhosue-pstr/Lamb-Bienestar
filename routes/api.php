<?php

use App\Http\Controllers\SolicitudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('solicitudes',[SolicitudController::class,'index']);
Route::post('solicitudes',[SolicitudController::class,'store']);
Route::put('solicitudes/{solicitud}',[SolicitudController::class,'update']);
Route::get('solicitudes/{solicitud}',[SolicitudController::class,'show']);
Route::delete('solicitudes/{solicitud}',[SolicitudController::class,'destroy']);

