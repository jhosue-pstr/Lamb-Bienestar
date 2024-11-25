<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class InformacionController extends Controller
{
    // Mostrar la vista de "mas-informacion"
    public function index()
    {
        return view('mas-informacion');
    }

    // Método para obtener los eventos por tipo (API)
    public function getEventosByTipo($tipo)
    {
        $eventos = Eventos::where('tipo', $tipo)->get();
        return response()->json($eventos);
    }

    // Método para obtener un evento por ID (API)
    public function getEventoById($id)
    {
        $evento = Eventos::find($id);
        if ($evento) {
            return response()->json([
                'id' => $evento->id,
                'nombre' => $evento->nombre,
                'ubicacion' => $evento->ubicacion,
                'fecha' => $evento->fecha,
                'hora' => $evento->hora,
                'descripcion' => $evento->descripcion,
                'afiche' => $evento->afiche ? asset($evento->afiche) : '/imagenes/default.jpeg'
            ]);
        }
        return response()->json(['error' => 'Evento no encontrado'], 404);
    }
}
