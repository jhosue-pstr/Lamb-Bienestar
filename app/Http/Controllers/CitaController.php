<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function detalle($id)
    {
        $cita = Cita::findOrFail($id);  // Buscar la cita por su ID

        // Devolver la vista con los datos de la cita
        return view('cita.detalle', compact('cita'));
    }
}
