<?php

namespace App\Livewire;

use App\Models\Atenciones;
use App\Models\Estudiante;
use App\Models\Historial;
use Livewire\Component;

class AtencionMain extends Component
{
    public $IdEstudiante;
    public $search = '';
    public $estudiantes = [];
    public $selectedEstudiante;
    public $motivo;
    public $tipo;
    public $responsable;
    public $fecha_atencion;
    public $descripcion_motivo;
    public $otros_datos;

    public function render()
    {
        return view('atencion-create');
    }

    public function updatedSearch()
    {
        if (strlen($this->search) > 2) { // Buscar si hay más de 2 caracteres
            $this->estudiantes = Estudiante::where('nombre', 'like', "%{$this->search}%")
                ->orWhere('apellidoPaterno', 'like', "%{$this->search}%")
                ->orWhere('apellidoMaterno', 'like', "%{$this->search}%")
                ->limit(10)
                ->get();
        } else {
            $this->estudiantes = [];
        }
    }

    public function selectEstudiante($id)
    {
        $this->IdEstudiante = $id;
        $this->selectedEstudiante = Estudiante::find($id);

        if ($this->selectedEstudiante) {
            $this->search = ''; // Limpiar el campo de búsqueda tras la selección
            $this->estudiantes = []; // Limpiar los resultados
        }
    }

    public function store()
    {
        $this->validate([
            'IdEstudiante' => 'required|exists:estudiantes,id',
            'motivo' => 'required|string|max:322',
            'tipo' => 'required|string|max:100',
            'responsable' => 'required|string|max:255',
            'fecha_atencion' => 'required|date|after_or_equal:today',
            'descripcion_motivo' => 'nullable|string|max:500',
            'otros_datos' => 'nullable|string|max:500',
        ]);

        // Crear la atención
        $atencion = Atenciones::create([
            'motivoAtencion' => $this->motivo,
            'tipo' => $this->tipo,
            'responsable' => $this->responsable,
            'fechaAtencion' => $this->fecha_atencion,
            'descripcionMotivo' => $this->descripcion_motivo ?? 'N/A',
            'otrosDatos' => $this->otros_datos ?? 'N/A',
            'idEstudiante' => $this->IdEstudiante,
        ]);

        // Actualizar el historial
        Historial::updateOrCreate(
            ['idEstudiante' => $atencion->idEstudiante],
            ['idAtencion' => $atencion->id]
        );

        // Mostrar mensaje de éxito
        session()->flash('message', 'Atención registrada correctamente.');

        // Resetear el formulario
        $this->reset(['IdEstudiante', 'selectedEstudiante', 'motivo', 'tipo', 'responsable', 'fecha_atencion', 'descripcion_motivo', 'otros_datos', 'search']);}
}
