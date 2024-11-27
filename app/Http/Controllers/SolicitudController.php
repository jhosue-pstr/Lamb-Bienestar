<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud; // Asegúrate de tener el modelo de Solicitud
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class SolicitudController extends Controller
{
    use ApiResponser;

    // Mostrar todas las solicitudes
    public function index()
    {
        $solicitudes = Solicitud::all();
        return $this->successResponse($solicitudes);
    }

    // Crear una nueva solicitud
    public function store(Request $request)
    {
        // Validación de los datos
        $rules = [
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:500',
            'fecha_solicitud' => 'required|date',
        ];

        // $this->validate($request, $rules); // Si no estás usando el ApiResponser, descomenta esto para validar

        // Crear la solicitud
        $solicitud = Solicitud::create($request->all());
        return $this->successResponse($solicitud, Response::HTTP_CREATED);
    }

    // Actualizar una solicitud existente
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $rules = [
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:500',
            'fecha_solicitud' => 'required|date',
        ];

        // $this->validate($request, $rules); // Descomenta si validas los datos

        // Encontrar la solicitud por su ID
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->fill($request->all());

        // Validar si no hay cambios
        if ($solicitud->isClean()) {
            return $this->errorResponse('Al menos un campo debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Guardar los cambios
        $solicitud->save();
        return $this->successResponse($solicitud, Response::HTTP_OK);
    }

    // Mostrar una solicitud específica
    public function show($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return $this->successResponse($solicitud);
    }

    // Eliminar una solicitud
    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();
        return $this->successResponse($solicitud);
    }
}
