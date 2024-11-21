<?php

namespace App\Livewire;

use App\Models\Estudiantes;
use Livewire\Component;

class Estudiante extends Component
{
    public $search = '';  // Variable para el término de búsqueda

    public function render()
    {
        // Filtrar estudiantes por nombre
        $estudiantes = Estudiantes::where('nombre', 'like', '%' . $this->search . '%')->get();

        return view('livewire.estudiante', compact('estudiantes'));
    }
}
