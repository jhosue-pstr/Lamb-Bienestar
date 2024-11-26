<?php
namespace App\Livewire;

use App\Models\Cita;
use Livewire\Component;

class EditarCita extends Component
{
    public $area;
    public $areas = [];
    public $citas = [];
    public $estados = [];  // Cambiar a un array para almacenar el estado de cada cita

    public function mount()
    {
        // Lista de áreas
        $this->areas = ['Psicologia', 'Centro Medico', 'Capellania', 'Atencion Medica', 'Sostenibilidad ambiental'];

        // Cargar todas las citas al inicio y inicializar sus estados
        $this->citas = Cita::with('estudiante')->get();
        foreach ($this->citas as $cita) {
            $this->estados[$cita->id] = $cita->estado;  // Inicializa el estado de cada cita
        }
    }

    public function filtrarCitas()
    {
        // Filtrar citas por área
        $query = Cita::query();
        if ($this->area) {
            $query->where('area', $this->area);
        }
        $this->citas = $query->with('estudiante')->get();
        foreach ($this->citas as $cita) {
            $this->estados[$cita->id] = $cita->estado;  // Asegurarse de que el estado esté sincronizado
        }
    }

    public function actualizarEstado($id)
    {
        // Actualizar el estado de la cita en la base de datos
        $cita = Cita::find($id);
        if ($cita) {
            $cita->estado = $this->estados[$id];  // Usar el estado específico de esa cita
            $cita->save();
        }
    }

    public function render()
    {
        return view('editar-cita');
    }
}
