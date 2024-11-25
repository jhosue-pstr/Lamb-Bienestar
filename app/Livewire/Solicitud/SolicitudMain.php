<?php

namespace App\Livewire\Solicitud;

use Livewire\Component;

class SolicitudMain extends Component
{
    public $showCreateForm = true;

    public function redirectToSelector()
    {
        return redirect()->route('beca.selector');
    }


    public function render()
    {

        return view('livewire.solicitud.solicitud-main');
    }

    public function saveSolicitud()
    {
        // Validaciones
        $this->validate([
            'plan' => 'required',
            'programa' => 'required',
            'campus' => 'required',
            'fecha' => 'required|date',
        ]);

        // Simulación de guardado o lógica real
        session()->flash('message', 'Solicitud creada correctamente.');

        // Resetear formulario y cerrar
        $this->reset(['plan', 'programa', 'campus', 'fecha', 'showCreateForm']);
    }
}
