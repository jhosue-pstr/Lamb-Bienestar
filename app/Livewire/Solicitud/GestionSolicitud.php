<?php

namespace App\Livewire\Solicitud;

use Livewire\Component;
use Livewire\WithFileUploads;

class GestionSolicitud extends Component
{

    use WithFileUploads;

    public $requisitos = [];
    public $comentarios = [];
    public $archivos = [];
    public $estados = [];
    public $tipoBeca;
    public $titulo;


    public function mount($tipoBeca = 'general')
    {
        // Asignar el tipo de beca recibido
        $this->tipoBeca = $tipoBeca;

        // Ajustar el título o datos en función del tipo de beca
        $this->titulo = $tipoBeca == 'alimentos'
            ? 'Beca de Alimentos'
            : 'Beca General';

        // Cargar datos iniciales
        $this->requisitos = [
            [
                'id' => 1,
                'nombre' => 'Solicitud del IPD',
                'descripcion' => 'Solicitud dirigida a la Comisión Becas.',
                'estado' => 'Pendiente',
            ],
            // ...otros requisitos
        ];
    }

    public function render()
    {
        return view('livewire.solicitud.gestion-solicitud');
    }
}
