<?php

namespace App\Livewire;

use App\Http\Controllers\AtencionController;
use App\Livewire\Forms\AtencionForm;
use App\Models\Atenciones;
use App\Models\Estudiantes;
use App\Models\Historials;
use Illuminate\Routing\Route;
use Livewire\Component;

class AtencionMain extends Component
{
    public $estudiante_id;
    public $motivo;
    public $tipo;
    public $resposable;
    public $fecha_atencion;
    public $search = '';
    public $estudiantes =[];
    public $observaciones;
    public $descripcion_motivo;
    public $otros_datos;


    public function mount()
    {
        $this->estudiantes = Estudiantes::all();
    }



    // Selecciona un estudiante de la lista de resultados
    public function selectEstudiante($estudianteId)
    {
        $this->estudiante_id = $estudianteId;
        $estudiante = Estudiantes::find($estudianteId);
        $this->search = $estudiante->nombre . ' ' . $estudiante->apellido;
        $this->estudiantes = []; // Limpia los resultados
    }

    public function store()
    {
        // Validar los datos
        $this->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'motivo' => 'required|string|max:322',
            'tipo' => 'required|string|max:100',
            'resposable' => 'required|string|max:255',
            'fecha_atencion' => 'required|date',
            'descripcion_motivo' => 'nullable|string|max:500',
            'otros_datos' => 'nullable|string|max:500',
        ]);

        $observaciones = $this->observaciones ?? 'N/A';
        $descripcion_motivo = $this->descripcion_motivo ?? 'N/A';
        $otros_datos = $this->otros_datos ?? 'N/A';

        $atencion = Atenciones::create([
            'motivo_atencion' => $this->motivo,
            'tipo' => $this->tipo,
            'resposable' => $this->resposable,
            'fecha_atencion' => $this->fecha_atencion,
            'numero_derivaciones' => '0', // Default value
            'descripcion_motivo' => $descripcion_motivo,
            'observaciones' => $observaciones, // Default value
            'seguimiento_de_caso' => 'N/A', // Default value
            'estado' => 'pendiente',
            'ingreso' => true,
            'otros_datos' => $otros_datos,
            'estudiante_id' => $this->estudiante_id,
            'idCitas' => 1, // Ajustar según corresponda
        ]);

        // Buscar el historial existente para el estudiante
        $historial = Historials::where('estudiantes_id', $atencion->estudiante_id)->first();

        if (!$historial) {
            $historial = new Historials();
            $historial->estudiantes_id = $atencion->estudiante_id;
            $historial->tipo = 'Atención';
            $historial->descripcion = 'Historial de atención para el estudiante.';
            $historial->numero_atenciones = 1;
            $historial->save();
        } else {
            $historial->numero_atenciones += 1;
            $historial->save();
        }

        // Mostrar mensaje de éxito
        session()->flash('message', 'Atención y historial creados correctamente.');

        // Limpiar el formulario
        $this->reset([
            'estudiante_id', 'motivo', 'tipo', 'resposable', 'fecha_atencion', 'descripcion_motivo', 'observaciones', 'otros_datos', 'search'
        ]);
    }
///////////

    public function render()
    {
        return view('livewire.atencion-create');
    }
}
