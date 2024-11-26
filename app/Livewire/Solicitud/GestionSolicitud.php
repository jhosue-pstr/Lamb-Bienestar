<?php

namespace App\Livewire\Solicitud;

use App\Models\TipoRequisito;
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

    public $pdf_requisito; // Para manejar el archivo PDF subido

    // Método para seleccionar una beca y redirigir

    public function mount($tipoBeca)
    {
        $this->tipoBeca = $tipoBeca;

        // Aquí obtienes los datos desde la base de datos, si es necesario
        $becaSeleccionada = session()->get('becaSeleccionada', []);

        // Si la beca seleccionada tiene los requisitos, los asignas
        $this->requisitos = $becaSeleccionada['requisitos'] ?? [];
        $this->titulo = $becaSeleccionada['nombre'] ?? 'Beca no seleccionada';
    }



    public function uploadPDF($requisito_id)
    {
        // Validar que el archivo sea PDF y que no exceda 10MB
        $this->validate([
            'pdf_requisito' => 'mimes:pdf|max:10240', // Max 10MB
        ]);

        // Almacenar el archivo
        $pdfPath = $this->pdf_requisito->store('pdf_requisitos');

        // Asignar el archivo al requisito correspondiente
        $requisito = TipoRequisito::find($requisito_id);
        $requisito->pdf_requisito = $pdfPath;
        $requisito->save();
    }

    public function showDescription($requisito_id)
{
    $requisito = TipoRequisito::find($requisito_id);

    if ($requisito && $requisito->pdf_requisito) {
        return response()->file(storage_path('app/' . $requisito->pdf_requisito));
    }

    return abort(404, 'Archivo no encontrado');
}


    public function render()
    {

        return view('livewire.solicitud.gestion-solicitud',[
        'requisitos' => $this->requisitos
        ] );

    }

}
