<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventosAnunciosController extends Controller
{
    public function index()
    {
        $eventosGenerales = Evento::where('tipo', 'todos')->get();
        $eventosEscuela = Evento::where('tipo', 'carrera')->get();
        return view('eventos-anuncios', compact('eventosGenerales', 'eventosEscuela'));
    }
    public function mostrar($id)
    {
        $evento = Evento::findOrFail($id);

        if (request()->ajax()) {
            return response()->json($evento);
        }

        $eventos = Evento::all();
        $tipos = Evento::distinct()->pluck('tipo');

        return view('mas-informacion', compact('evento', 'eventos', 'tipos'));
    }



    public function filtrarPorTipo(Request $request)
    {
        $tipo = $request->query('tipo'); // Tipo seleccionado
        $eventos = Evento::where('tipo', $tipo)->get(); // Filtrar eventos por tipo

        return response()->json($eventos); // Devolver eventos en formato JSON
    }



}
