<?php

namespace App\Livewire;

use App\Http\Controllers\AtencionController;
use App\Livewire\Forms\AtencionForm;
use App\Models\Atenciones;
use Illuminate\Routing\Route;
use Livewire\Component;

class AtencionMain extends Component
{
    public AtencionForm $form;
    public $isOpen = false;
    public $search = '';

    public function render()
    {
        // Obtener las atenciones con búsqueda y paginación
        $atencioness = Atenciones::where('tipo', 'LIKE', '%' . $this->search . '%')
            ->orWhere('motivo de atencion', 'LIKE', '%' . $this->search . '%')
            ->paginate(10);

        // Pasar las atenciones a la vista
        return view('livewire.atencion-create', [
            'atencioness' => $atencioness
        ]);
    }

    public function edit(Atenciones $atencion)
    {
        // Lógica para editar una atención
        // Esto puede incluir abrir un modal con los detalles de la atención para editarla
    }

    public function delete(Atenciones $atencion)
    {
        // Lógica para eliminar una atención
        $atencion->delete();
        session()->flash('message', 'Atención eliminada correctamente.');
    }
}
