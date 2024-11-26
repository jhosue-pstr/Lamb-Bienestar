<?php

namespace App\Livewire;

use App\Models\Cita;
use Livewire\Component;

class EditarCita extends Component
{
    public $area;
    public $areas = [];
    public $citas = [];
    public $cita; // Cita seleccionada
    public $estado; // Agregar propiedad para el estado
    public $fecha;  // Agregar propiedad para la fecha
    public $hora;   // Agregar propiedad para la hora

    public function mount()
    {
        // Definir las áreas disponibles
        $this->areas = ['Psicologia', 'Centro Medico', 'Capellania', 'Atencion Medica', 'Sostenibilidad ambiental'];

        // Cargar todas las citas al inicio
        $this->citas = Cita::with('estudiante')->get();
    }

    public function filtrarCitas()
    {
        // Filtrar las citas por área seleccionada
        $query = Cita::query();
        if ($this->area) {
            $query->where('area', $this->area);
        }
        $this->citas = $query->with('estudiante')->get();
    }

    public function editarCita($id)
    {
        // Cargar la cita seleccionada
        $this->cita = Cita::find($id);

        // Cargar los valores actuales en las propiedades
        $this->estado = $this->cita->estado;
        $this->fecha = $this->cita->fecha;
        $this->hora = $this->cita->hora;
        $this->area = $this->cita->area;
    }

    public function guardarCita()
    {
        // Validar los datos antes de guardarlos
        $this->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|in:Asistió,No asistió,Pendiente',
        ]);

        // Actualizar la cita con los nuevos valores
        $this->cita->update([
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'estado' => $this->estado,
        ]);

        // Mensaje de éxito
        session()->flash('message', 'Cita actualizada correctamente.');

        // Cerrar el modal después de guardar
        $this->dispatchBrowserEvent('close-modal');

        // Recargar la lista de citas
        $this->filtrarCitas();
    }

    public function render()
    {
        return view('editar-cita');
    }
}
