<?php

namespace App\Http\Controllers;

use App\Models\Recordatorio;
use Illuminate\Http\Request;

class RecordatorioController extends Controller
{
    // Método para guardar un nuevo recordatorio
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo' => 'required|string',
            'nombre' => 'required|string',
            'ubicacion' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'nullable|string',
        ]);

        $recordatorio = Recordatorio::create($validatedData);

        return response()->json(['success' => true, 'recordatorio' => $recordatorio]);
    }

    // Método para obtener el último recordatorio
    public function getLatest()
    {
        $recordatorio = Recordatorio::orderBy('created_at', 'desc')->first();
        if (!$recordatorio) {
            return response()->json(['success' => false, 'message' => 'No hay recordatorios disponibles.']);
        }
        return response()->json($recordatorio);
    }

}
