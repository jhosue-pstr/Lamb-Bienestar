<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnuncioController extends Controller
{

    public function getAnuncioJson($id)
    {
        $anuncio = Anuncio::find($id);
        if (!$anuncio) {
            return response()->json(['error' => 'Anuncio no encontrado'], 404);
        }
        return response()->json($anuncio);
    }


    public function masInformacion2()
    {
        // Obtener todos los anuncios
        $anuncios = Anuncio::all();

        // Pasar los anuncios a la vista 'mas-informacion2'
        return view('mas-informacion2', compact('anuncios'));
    }

    public function anuncios()
    {
        // Obtener todos los anuncios en orden de más reciente a más antiguo
        $anuncios = Anuncio::orderBy('created_at', 'desc')->get();

        // Pasar los anuncios a la vista 'anuncios'
        return view('anuncios', compact('anuncios'));
    }
    // Método para mostrar la vista de "creacion-anuncio" con todos los anuncios
    public function index()
    {
        $anuncios = Anuncio::all(); // Recuperar todos los anuncios
        return view('creacion-anuncio', compact('anuncios')); // Enviar a la vista
    }

    // Método para mostrar el formulario de creación de un nuevo anuncio
    public function create()
    {
        return view('creacion-anuncio-detalles');
    }

    // Método para guardar un nuevo anuncio en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'required|string',
            'afiche' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Subir la imagen si se proporcionó
        $afichePath = null;
        if ($request->hasFile('afiche')) {
            // Guardar la imagen en 'public/imagenes' y devolver la ruta relativa
            $afiche = $request->file('afiche');
            $aficheName = time() . '_' . $afiche->getClientOriginalName();
            $afiche->move(public_path('imagenes'), $aficheName);
            $afichePath = 'imagenes/' . $aficheName;
        }

        // Crear el anuncio en la base de datos
        Anuncio::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'descripcion' => $request->descripcion,
            'afiche' => $afichePath,
        ]);

        return redirect()->route('creacion-anuncio')->with('success', 'Anuncio creado exitosamente.');
    }

    // Método para mostrar los detalles de un anuncio específico
    public function show($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        return view('anuncio-detalle', compact('anuncio'));

    }

    // Método para eliminar un anuncio
    public function destroy($id)
    {
        // Buscar el anuncio por su ID
        $anuncio = Anuncio::findOrFail($id);

        // Eliminar el afiche si existe
        if ($anuncio->afiche && file_exists(public_path($anuncio->afiche))) {
            unlink(public_path($anuncio->afiche));
        }

        // Eliminar el anuncio de la base de datos
        $anuncio->delete();

        return redirect()->route('creacion-anuncio')->with('success', 'Anuncio eliminado exitosamente.');
    }

    // Método para mostrar el formulario de edición de un anuncio
    public function edit($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        return view('editar-anuncio', compact('anuncio'));
    }

    // Método para actualizar un anuncio en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'required|string',
            'afiche' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $anuncio = Anuncio::findOrFail($id);

        // Subir la nueva imagen si se proporcionó
        if ($request->hasFile('afiche')) {
            // Eliminar la imagen anterior si existe
            if ($anuncio->afiche && file_exists(public_path($anuncio->afiche))) {
                unlink(public_path($anuncio->afiche));
            }

            // Guardar la nueva imagen
            $afiche = $request->file('afiche');
            $aficheName = time() . '_' . $afiche->getClientOriginalName();
            $afiche->move(public_path('imagenes'), $aficheName);
            $anuncio->afiche = 'imagenes/' . $aficheName;
        }

        // Actualizar los demás campos
        $anuncio->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('creacion-anuncio')->with('success', 'Anuncio actualizado exitosamente.');
    }
}

