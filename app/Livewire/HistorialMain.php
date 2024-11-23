<?php

namespace App\Livewire;

use App\Models\Historials;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class HistorialMain extends Component
{
    use WithPagination;
    use WireUiActions;

    public $search;
    public $active = true;

    public function render()
{
    // Filtrar por el nombre del estudiante
    $historias = Historials::with('estudiante') // Cargar la relación 'estudiante'
        ->whereHas('estudiante', function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->search . '%'); // Filtrar por el nombre del estudiante
        })
        ->paginate(5); // Paginación para manejar los historiales en múltiples páginas

    return view('livewire.historial-main', compact('historias'));
}




    // Método para reiniciar la búsqueda
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
