<?php

namespace App\Http\Controllers;

use App\Models\Recordatorio;
use Illuminate\Http\Request;

class RecordatorioController extends Controller
{
    // Método para guardar un nuevo recordatorio
    public function store(Request $request)
    {
        // Validar datos del formulario
        $validatedData = $request->validate([
            'tipo' => 'required|string',
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'nullable|string|max:500',
        ]);

        // Guardar el recordatorio en la base de datos
        Recordatorio::create($validatedData);

        return response()->json(['success' => 'Recordatorio añadido correctamente.']);
    }


    public function ultimoRecordatorio() {
        $recordatorio = Recordatorio::latest()->first();
        return response()->json($recordatorio);
    }


    // Método para obtener el último recordatorio
    public function getLatest()
    {
        $recordatorio = Recordatorio::orderBy('created_at', 'desc')->first();
        if (!$recordatorio) {
            return response()->json(['success' => false, 'message' => 'No hay recordatorios disponibles.']);
        }
        return response()->json([
            'nombre' => $recordatorio->nombre ?? 'Sin nombre',
            'fecha' => $recordatorio->fecha ?? 'Sin fecha',
            'hora' => $recordatorio->hora ?? 'Sin hora',]);}


}
