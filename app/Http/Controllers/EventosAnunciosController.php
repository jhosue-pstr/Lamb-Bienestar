<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventosAnunciosController extends Controller
{
    public function index()
    {
        $eventosGenerales = Eventos::where('tipo', 'todos')->get();
        $eventosEscuela = Eventos::where('tipo', 'carrera')->get();
        return view('eventos-anuncios', compact('eventosGenerales', 'eventosEscuela'));
    }
    public function mostrar($id)
    {
        $evento = Eventos::findOrFail($id);

        if (request()->ajax()) {
            return response()->json($evento);
        }

        $eventos = Eventos::all();
        $tipos = Eventos::distinct()->pluck('tipo');

        return view('mas-informacion', compact('evento', 'eventos', 'tipos'));
    }



    public function filtrarPorTipo(Request $request)
    {
        $tipo = $request->query('tipo'); // Tipo seleccionado
        $eventos = Eventos::where('tipo', $tipo)->get(); // Filtrar eventos por tipo

        return response()->json($eventos); // Devolver eventos en formato JSON
    }



}
