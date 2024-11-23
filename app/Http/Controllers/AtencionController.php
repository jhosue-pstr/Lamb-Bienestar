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
    public function main($estudiante_id, Request $request)
    {
        // Obtener el estudiante por ID
        $estudiante = Estudiantes::findOrFail($estudiante_id);

        // Obtener las atenciones del estudiante
        $atenciones = Atenciones::where('estudiante_id', $estudiante_id)->paginate(5);

        // Verificar si hay una atención específica que se quiere expandir (detalles)
        $expandedAtencionId = $request->query('expanded_atencion');

        // Retornar la vista con los datos
        return view('livewire.atencion-main', compact('estudiante', 'atenciones', 'expandedAtencionId'));
    }

    /**
     * Almacenar una nueva atención.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'motivo_de_atencion' => 'required|string|max:255',
            'tipo' => 'required|string',
            'responsable' => 'required|string',
            'fecha_atencion' => 'required|date',
            'numero_derivaciones' => 'required|string',
            'descripcion_motivo' => 'required|string',
            'observaciones' => 'nullable|string',
            'seguimiento_de_caso' => 'nullable|string',
            'estado' => 'required|string',
            'ingreso' => 'required|boolean',
            'otros_datos' => 'nullable|string',
            'estudiante_id' => 'required|exists:estudiantes,id',
        ]);

        // Crear la nueva atención
        Atenciones::create($request->all());

        // Redirigir a la lista de atenciones del estudiante
        return redirect()->route('atencion.main', ['estudiante_id' => $request->estudiante_id])
                         ->with('success', 'Atención creada correctamente');
    }
}
