<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    // Método para mostrar la vista de "creacion-evento" con todos los eventos
    public function index()
    {
        $eventos = Eventos::all();
        return view('creacion-evento', compact('eventos'));
    }





    // Método para mostrar el formulario de creación de un nuevo evento
    public function create()
    {
        return view('creacion-evento-detalles');
    }

    // Método para guardar un nuevo evento en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'ubicacion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'required|string',
            'afiche' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Verificar si se ha subido un archivo
        if ($request->hasFile('afiche')) {
            $afiche = $request->file('afiche');
            $aficheName = time() . '_' . $afiche->getClientOriginalName();
            $afiche->move(public_path('imagenes'), $aficheName);
            $afichePath = 'imagenes/' . $aficheName;
        } else {
            $afichePath = null; // Si no se sube una imagen, el campo puede quedar nulo
        }

        // Guardar los datos en la base de datos
        Eventos::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'ubicacion' => $request->ubicacion,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'descripcion' => $request->descripcion,
            'afiche' => $afichePath, // Guardar la ruta de la imagen
        ]);
        return redirect()->route('creacion-evento')->with('success', 'Evento creado exitosamente.');
    }



    // Método para mostrar los detalles de un evento específico
    public function show($id)
    {
        $evento = Eventos::findOrFail($id);
        return view('evento-detalle', compact('evento'));
    }

    // Método para obtener eventos por tipo (API)
    public function getEventosByTipo($tipo)
    {
        $eventos = Eventos::where('tipo', $tipo)->get();
        return response()->json($eventos);
    }




    // Método para obtener un evento por ID (API)
    public function getEventoById($id)
    {
        $evento = Eventos::find($id);
        return response()->json($evento);
    }


    public function destroy($id)
{
    // Buscar el evento por su ID
    $evento = Eventos::findOrFail($id);

    // Eliminar el afiche si existe
    if ($evento->afiche && file_exists(public_path($evento->afiche))) {
        unlink(public_path($evento->afiche));
    }

    // Eliminar el evento de la base de datos
    $evento->delete();

    return redirect()->route('creacion-evento')->with('success', 'Evento eliminado exitosamente.');
}






public function edit($id)
{
    $evento = Eventos::findOrFail($id);
    return view('editar-evento', compact('evento'));
}

public function update(Request $request, $id)
{
    $evento = Eventos::findOrFail($id);

    $evento->update([
        'nombre' => $request->nombre,
        'tipo' => $request->tipo,
        'ubicacion' => $request->ubicacion,
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'descripcion' => $request->descripcion,
    ]);

    return redirect()->route('creacion-evento')->with('success', 'Evento actualizado exitosamente.');
}








}
