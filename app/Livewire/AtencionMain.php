<?php

namespace App\Livewire;

use App\Models\Atenciones;
use App\Models\Cita;
use App\Models\Estudiante;
use App\Models\Historial;
use Livewire\Component;

class AtencionMain extends Component
{
    public $IdEstudiante;
    public $motivo;
    public $tipo;
    public $responsable;
    public $fecha_atencion;
    public $search = '';
    public $estudiantes = [];
    public $observaciones;
    public $descripcion_motivo;
    public $otros_datos;

    // Inicializa los datos al montar el componente
    public function mount()
    {
        $this->estudiantes = Estudiante::all(); // Carga todos los estudiantes inicialmente
    }

    public function updatedSearch()
{
    if (strlen($this->search) > 2) {
        // Búsqueda de estudiantes por nombre, apellidoPaterno y apellidoMaterno
        $this->estudiantes = Estudiante::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('apellidoPaterno', 'like', '%' . $this->search . '%')
            ->orWhere('apellidoMaterno', 'like', '%' . $this->search . '%')
            ->limit(10)  // Limitar los resultados a 10 para mejorar la eficiencia
            ->get();
    } else {
        $this->estudiantes = collect();  // Limpiar resultados si la búsqueda es demasiado corta
    }
}



public function selectEstudiante($estudianteId)
{
    $estudiante = Estudiante::find($estudianteId); // Encuentra al estudiante seleccionado
    $this->IdEstudiante = $estudiante->id;
    $this->search = $estudiante->nombre . ' ' . $estudiante->apellidoPaterno . ' ' . $estudiante->apellidoMaterno; // Actualiza el campo de búsqueda
    $this->estudiantes = []; // Limpia la lista de búsqueda
}


    public function store()
    {
            $this->validate([
            'IdEstudiante' => 'required|exists:estudiantes,id',
            'motivo' => 'required|string|max:322',
            'tipo' => 'required|string|max:100',
            'responsable' => 'required|string|max:255',
            'fecha_atencion' => 'required|date|after_or_equal:today',
            'descripcion_motivo' => 'nullable|string|max:500',
            'otros_datos' => 'nullable|string|max:500',
        ]);

        // Asignar valores predeterminados a campos opcionales
        $observaciones = $this->observaciones ?? 'N/A';
        $descripcion_motivo = $this->descripcion_motivo ?? 'N/A';
        $otros_datos = $this->otros_datos ?? 'N/A';

        $atencion = Atenciones::create([
            'motivoAtencion' => $this->motivo,
            'tipo' => $this->tipo,
            'responsable' => $this->responsable,
            'fechaAtencion' => $this->fecha_atencion,  // Usamos 'fechaAtencion' para que coincida con la migración
            'descripcionMotivo' => $descripcion_motivo,
            'lesionObservaciones' => $observaciones,  // Asegúrate de que los nombres de las columnas coincidan
            'seguimientoCaso' => 'N/A',
            'otrosDatos' => $otros_datos,
            'idEstudiante' => $this->IdEstudiante,
        ]);

        // Actualizar el historial del estudiante
        $this->updateHistorial($atencion);

        // Mensaje de éxito
        session()->flash('message', 'Atención y historial creados correctamente.');

        // Limpiar los campos del formulario
        $this->reset([
            'IdEstudiante', 'motivo', 'tipo', 'responsable', 'fecha_atencion', 'descripcion_motivo', 'observaciones', 'otros_datos', 'search'
        ]);
    }

    private function getCitaId()
{
      $cita = Cita::firstOrCreate([
        'idEstudiante' => $this->IdEstudiante,
        'fecha' => now(),  // Aquí podrías agregar la lógica que necesites para obtener o crear una cita
    ]);

    return $cita->id ?? null;  // Devuelve el ID de la cita o null si no existe
}


    private function updateHistorial($atencion)
{
    // Obtener o crear un historial para el estudiante
    $historial = Historial::where('idEstudiante', $atencion->idEstudiante)->first();

    // Si no existe un historial, lo creamos
    if (!$historial) {
        // Asignamos null a idCita si no se requiere una cita
        $idCita = null;

        $historial = new Historial();
        $historial->idEstudiante = $atencion->idEstudiante;
        $historial->idAtencion = $atencion->id;  // Vinculamos la atención recién creada
        $historial->idCita = $idCita;  // Asignamos null si no hay una cita
    } else {
        // Si ya existe un historial, solo agregamos la nueva atención
        $historial->idAtencion = $atencion->id;
    }

    // Guardamos el historial actualizado
    $historial->save();
}



    public function render()
    {
     return view('atencion-create');}
}
