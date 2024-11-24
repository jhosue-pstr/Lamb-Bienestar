<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function show($id)
{
    $cita = Cita::findOrFail($id);  // Encuentra la cita por ID
    $estudiante = Estudiante::find($cita->estudiante_id);  // Encuentra al estudiante relacionado

    return view('cita-detalle', compact('cita', 'estudiante'));
}
}
