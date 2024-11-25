<?php

namespace App\Livewire;

use App\Models\Cita;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class EstudianteMain extends Component
{
    use WithPagination;
    use WireUiActions;

    public $estudiante;
    public $search;
    public $isOpen = false;
    public $active = true;
    public $historialVisible = true;

    public function mount()
    {
        $this->estudiante = Auth::user()->estudiante;
    }

    public function render()
    {
        // Consulta con paginación en la función render()
        $citas = $this->estudiante
            ? $this->estudiante->citas()
                ->where('motivo', 'like', '%' . $this->search . '%') // Si quieres búsqueda
                ->paginate(10)
            : collect();

        return view('estudiante-main', [
            'estudiante' => $this->estudiante,
            'citas' => $citas,  // Paginación ya aplicada aquí
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showMoreInfo()
    {
        $this->isOpen = true; // Mostrar más información
    }

    public function closeModal()
    {
        $this->isOpen = false; // Cerrar la ventana modal
    }
}
