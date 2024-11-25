<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    // Mostrar la vista principal
    public function crear()
    {
        return view('crear-citas');
    }

    // Buscar estudiante por su código
    public function buscarEstudiante(Request $request)
    {
        $codigo = $request->input('codigo');

        // Cambiar a 'estudiantes' (nombre correcto de la tabla según tu base de datos)
        $estudiante = DB::table('estudiantes')
            ->where('codigo', $codigo)
            ->first();

        if ($estudiante) {
            return response()->json($estudiante);
        } else {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }
    }

    // Guardar una nueva cita en la base de datos
    public function guardarCita(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|integer',
            'area' => 'required|in:Psicologia,Centro Medico,Capellania,Atencion Medica,Sostenibilidad ambiental',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'nullable|string',
        ]);

        // Buscar estudiante por código
        $estudiante = DB::table('estudiantes')->where('codigo', $validatedData['codigo'])->first();

        if (!$estudiante) {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }

        // Crear cita
        Cita::create([
            'estudiante_id' => $estudiante->id,
            'area' => $validatedData['area'],
            'fecha' => $validatedData['fecha'],
            'hora' => $validatedData['hora'],
            'motivo' => $validatedData['motivo'] ?? '',
            'estado' => 'pendiente',
        ]);

        return response()->json(['success' => 'Cita agendada correctamente.']);
    }




    public function getUltimaCita()
{
    try {
        $ultimaCita = Cita::orderBy('created_at', 'desc')->first();

        if ($ultimaCita) {
            return response()->json([
                'area' => $ultimaCita->area ?? 'Sin área',
                'estado' => $ultimaCita->estado ?? 'Sin estado',
                'fecha' => $ultimaCita->fecha ?? 'Sin fecha',
                'hora' => $ultimaCita->hora ?? 'Sin hora',
            ], 200);
        } else {
            return response()->json(['message' => 'No hay citas registradas'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error interno: ' . $e->getMessage()], 500);
    }
}






    // Obtener todas las citas para mostrarlas en el calendario
    public function obtenerCitas()
    {
        $citas = Cita::all();

        // Transformar los datos para el calendario
        $eventos = $citas->map(function ($cita) {
            return [
                'title' => "Reservado - {$cita->hora}",
                'start' => "{$cita->fecha}T{$cita->hora}",
                'color' => 'red',
                'extendedProps' => [
                    'codigo' => $cita->codigo, // Ajustado para usar 'codigo'
                    'area' => $cita->area,
                    'motivo' => $cita->motivo,
                    'hora' => $cita->hora,
                ]
            ];
        });

        return response()->json($eventos);}
}
