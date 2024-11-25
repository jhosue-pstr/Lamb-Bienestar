<?php

namespace App\Livewire\Beca;

use Livewire\Component;

class BecaAlimento extends Component
{

    public function backToSelection()
    {
        // Redirige al usuario a la selección de becas.
        return redirect()->route('becas.seleccion');
    }

    public function applyForBeca()
    {
        // Lógica para aplicar a la beca de alimentos.
        session()->flash('message', 'Has aplicado exitosamente a la Beca de Alimentos.');
    }
    public function render()
    {
        return view('livewire.becas.beca-alimento');
    }
}
