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
            'motivo' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'resposable' => 'required|string|max:255',
            'fecha_atencion' => 'required|date',
        ]);

        // Crear la atención
        $atencion = Atenciones::create([
            'motivo de atencion' => $this->motivo,
            'tipo' => $this->tipo,
            'resposable' => $this->resposable,
            'fecha atencion' => $this->fecha_atencion,
            'numero derivaciones' => '0', // Default value (or add your logic)
            'descripcion motivo' => 'N/A', // Default value (or add your logic)
            'observaciones' => 'N/A', // Default value (or add your logic)
            'seguimiento de caso' => 'N/A', // Default value (or add your logic)
            'estado' => 'pendiente',
            'ingreso' => true,
            'otros datos' => 'N/A',
            'estudiante_id' => $this->estudiante_id,
            'idCitas' => 1, // Adjust accordingly if needed
        ]);

        // Crear el historial asociado
        Historials::create([
            'tipo' => 'Atención Registrada',
            'descripcion' => 'Atención registrada para el estudiante.',
            'estudiantes_id' => $this->estudiante_id,
            'atenciones_id' => $atencion->id,
            'idCita' => null, // O el valor que determines como "sin cita"
        ]);

        session()->flash('message', 'Atención y historial creados correctamente.');


        $this->reset([
            'estudiante_id', 'motivo', 'tipo', 'resposable', 'fecha_atencion', 'observaciones', 'search'
        ]);
    }

    public function render()
    {
        return view('livewire.atencion-create');
    }
}
