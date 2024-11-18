<?php

namespace App\Livewire\Solicitud;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class SolicitudMain extends Component
{
    use WithPagination;
    use WireUiActions;

    public $isOpen=false;
    public $search,$active=true;
    public function render()
    {
        return view('livewire.solicitud.solicitud-main');
    }
}
