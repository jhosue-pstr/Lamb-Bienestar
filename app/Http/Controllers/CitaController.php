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
        $estudiante = DB::table('estudiantes')->where('codigo', $codigo)->first();

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
            'codigo' => 'required',
            'area' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        $citaExistente = Cita::where('fecha', $validatedData['fecha'])
            ->where('hora', $validatedData['hora'])
            ->first();

        if ($citaExistente) {
            return response()->json(['error' => 'Ya existe una cita para esta fecha y hora.'], 409);
        }

        Cita::create([
            'codigo' => $validatedData['codigo'],
            'area' => $validatedData['area'],
            'motivo' => $request->input('motivo', ''),
            'fecha' => $validatedData['fecha'],
            'hora' => $validatedData['hora']
        ]);

        return response()->json(['success' => 'Cita agendada correctamente']);
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
                    'codigo' => $cita->codigo,
                    'area' => $cita->area,
                    'motivo' => $cita->motivo,
                    'hora' => $cita->hora,
                ]
            ];
        });

        return response()->json($eventos);
    }


    public function ultimaCita() {
        $cita = Cita::latest()->first();
        return response()->json($cita);
    }


}
