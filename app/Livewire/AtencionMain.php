<?php

namespace App\Livewire;

use App\Http\Controllers\AtencionController;
use App\Livewire\Forms\AtencionForm;
use App\Models\Atenciones;
use App\Models\Estudiante;
use App\Models\Historial;
use App\Models\Historials;
use Illuminate\Routing\Route;
use Livewire\Component;

class AtencionMain extends Component
{
    public $idEstudiante;
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
        $this->estudiantes = Estudiante::all();
    }



    // Selecciona un estudiante de la lista de resultados
    public function selectEstudiante($estudianteId)
    {
        $this->idEstudiante = $estudianteId;
        $estudiante = Estudiante::find($estudianteId);
        $this->search = $estudiante->nombre . ' ' . $estudiante->apellido;
        $this->estudiantes = []; // Limpia los resultados
    }

    public function store()
    {
        // Validar que el idEstudiante existe en la tabla estudiantes
        $estudiante = Estudiante::find($this->idEstudiante);
        if (!$estudiante) {
            session()->flash('error', 'El estudiante no existe.');
            return;
        }

        // Proceder con la inserción en la tabla atenciones
        Atenciones::create([
            'motivoAtencion' => $this->motivo,
            'tipo' => $this->tipo,
            'responsable' => $this->resposable,
            'fechaAtencion' => $this->fecha_atencion,
            'numero_derivaciones' => 0, // Default value
            'descripcionMotivo' => $this->descripcion_motivo ?? 'N/A',
            'lesionObservaciones' => $this->observaciones ?? 'N/A',
            'seguimientoCaso' => 'N/A', // Default value
            'estado' => 'pendiente',
            'ingreso' => true,
            'otrosDatos' => $this->otros_datos ?? 'N/A',
            'idEstudiante' => $this->idEstudiante, // Asegúrate de que sea el idEstudiante correcto
            'idCitas' => 1, // Ajustar según corresponda
        ]);

        // Actualizar o crear historial
        $historial = Historial::where('idEstudiante', $this->idEstudiante)->first();
        if (!$historial) {
            $historial = new Historial();
            $historial->idEstudiante = $this->idEstudiante;
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
            'idEstudiante', 'motivo', 'tipo', 'resposable', 'fecha_atencion', 'descripcion_motivo', 'observaciones', 'otros_datos', 'search'
        ]);
    }

///////////

    public function render()
    {
        return view('atencion-create');
    }
}

