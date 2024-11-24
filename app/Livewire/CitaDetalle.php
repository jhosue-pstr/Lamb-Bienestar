<?php

namespace App\Livewire;

use App\Models\Cita;
use App\Models\CitaCalificacion;
use App\Models\Estudiante;
use Livewire\Component;

class CitaDetalle extends Component
{
    public $cita;
    public $estudiante;
    public $calificacion;
    public $comentario;

    // Método para inicializar los datos
    public function mount($id)
    {
        $this->cita = Cita::findOrFail($id);
        $this->estudiante = Estudiante::findOrFail($this->cita->estudiante_id);
    }

    // Método para guardar la calificación
    public function guardarCalificacion()
    {
        // Validar que se haya proporcionado una calificación
        $this->validate([
            'calificacion' => 'required|integer|between:1,5',
            'comentario' => 'nullable|string|max:255',
        ]);

        // Guardar la calificación en la tabla 'cita_calificaciones'
        CitaCalificacion::create([
            'cita_id' => $this->cita->id,
            'calificacion' => $this->calificacion,
            'comentario' => $this->comentario,
        ]);

        // Puedes mostrar un mensaje de éxito o hacer algo más
        session()->flash('message', 'Gracias por calificar la cita!');
    }

    public function render()
    {
        return view('livewire.cita-detalle');
    }
}
