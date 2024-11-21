<?php

namespace App\Http\Controllers;

use App\Models\Atenciones;
use App\Models\Estudiantes;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    /**
     * Mostrar las atenciones del estudiante
     *
     * @param  int  $estudiante_id
     * @return \Illuminate\View\View
     */
    public function main($estudiante_id)
    {
        // Obtener el estudiante por ID
        $estudiante = Estudiantes::findOrFail($estudiante_id);

        // Obtener las atenciones del estudiante
        $atenciones = Atenciones::where('estudiante_id', $estudiante_id)->paginate(3);

        // Retornar la vista atencion-main sin cambios en el modelo
        return view('livewire.atencion-main', compact('estudiante', 'atenciones'));
    }
}
