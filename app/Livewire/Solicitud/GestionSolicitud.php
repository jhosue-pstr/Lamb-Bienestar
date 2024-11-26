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
        $this->validate([
            'archivos.' . $requisito_id => 'required|mimes:pdf|max:10240', // Validar PDF y tamaño máximo
        ]);

        // Almacenar el archivo en la carpeta `public/pdf_requisitos`
        $filePath = $this->archivos[$requisito_id]->store('public/pdf_requisitos');

        // Actualizar el registro en la base de datos
        $requisito = TipoRequisito::find($requisito_id);
        $requisito->pdf_requisito = $filePath;
        $requisito->save();

        // Mostrar mensaje de éxito
        session()->flash('success', 'Archivo subido correctamente.');
    }


    public function showDescription($requisito_id)
{
    $requisito = TipoRequisito::find($requisito_id);

    if ($requisito && $requisito->pdf_requisito) {
        return response()->file(storage_path('app/' . $requisito->pdf_requisito));
    }

    return abort(404, 'Archivo no encontrado');
}



public function showPDF($id)
{
    $requisito = TipoRequisito::find($id);

    if ($requisito && $requisito->pdf_requisito) {
        return response()->file(storage_path('app/' . $requisito->pdf_requisito));
    }

    abort(404, 'El archivo PDF no se encontró.');
}


    public function render()
    {

        return view('livewire.solicitud.gestion-solicitud',[
        'requisitos' => $this->requisitos
        ] );

    }

}
