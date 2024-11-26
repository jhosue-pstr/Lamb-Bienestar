<?php

namespace App\Livewire\Beca;

use Livewire\Component;

class BecaSeleccion extends Component
{
    public $becas = [];

    public function mount()
    {
        // Aquí definimos las becas con sus requisitos
        $this->becas = [
            [
                'nombre' => 'Beca por Convenio',
                'descripcion' => 'Reconocimiento a egresados destacados de instituciones educativas promovidas por la UPeU.',
                'requisitos' => [
                    'Constancia de haber ocupado uno de los dos primeros puestos en el ranking académico.',
                    'Haber egresado del nivel secundario con mínimo 3 años en institución de la promotora.',
                    'Ser estudiante regular de la UPeU.',
                    'Promedio ponderado mínimo de 14 y 100% de créditos aprobados.',
                    'Ficha socioeconómica.',
                ],
                'icono' => asset('Imagenes/Beca/beca_Convenio.png'), // Palabra clave "education"
            ],
            [
                'nombre' => 'Beca al Deportista Destacado',
                'descripcion' => 'Apoyo a deportistas calificados y de alto nivel.',
                'requisitos' => [
                    'Solicitud dirigida a la Comisión de Becas.',
                    'Solicitud del IPD para otorgamiento de beca.',
                    'Constancia de calificación como "Deportista de Alto Nivel".',
                    'Ser estudiante regular en el semestre académico.',
                    'Promedio ponderado mínimo de 14 y 100% de créditos aprobados.',
                    'Ficha socioeconómica.',
                ],
                'icono' =>  asset('Imagenes/Beca/Deporte.png'),
            ],
            [
                'nombre' => 'Beca Socioeconómica (BECA CREAF)',
                'descripcion' => 'Apoyo para estudiantes con carencias económicas.',
                'requisitos' => [
                    'Solicitud dirigida a la Comisión de Becas.',
                    'Ser estudiante regular en el semestre académico.',
                    'Promedio ponderado mínimo de 14 y 100% de créditos aprobados.',
                    'Estar apto para cursar el tercer ciclo.',
                    'Ficha socioeconómica.',
                    'Documentos adicionales según evaluación de Asistencia Social.',
                ],
                'icono' =>  asset('Imagenes/Beca/socio.jpg  '),
            ],
            [
                'nombre' => 'Beca Discapacidad',
                'descripcion' => 'Apoyo para estudiantes con discapacidad certificada.',
                'requisitos' => [
                    'Certificado de discapacidad emitido por el Ministerio de Salud o carnet CONADIS.',
                    'Ser estudiante regular en el semestre académico.',
                    'Promedio ponderado mínimo de 14 y 100% de créditos aprobados.',
                    'No haber sido sancionado.',
                    'Ficha socioeconómica.',
                ],
                'icono' =>  asset('Imagenes/Beca/inclusion.jpg  '),
            ],
            [
                'nombre' => 'Beca Primer Puesto en el Examen de Admisión',
                'descripcion' => 'Reconocimiento a estudiantes que ocupan el primer puesto en el cómputo general del examen de admisión.',
                'requisitos' => [
                    'Oficio que acredite el primer lugar en el cómputo general del proceso de admisión.',
                    'Ficha socioeconómica.',
                    'Constancia de no haber recibido sanciones disciplinarias.',
                    'Promedio ponderado mínimo de 14 y 100% de créditos aprobados.',
                ],
                'icono' =>  asset('Imagenes/Beca/primer.jpg  '),
            ],

        ];
    }

    public function seleccionarBeca($tipoBeca)
{
    // Encuentra la beca seleccionada
    $becaSeleccionada = collect($this->becas)->firstWhere('nombre', $tipoBeca);

    // Redirige a la ruta con los datos de la beca
    session()->put('becaSeleccionada', $becaSeleccionada);
    return redirect()->route('gestion.solicitud', ['tipoBeca' => strtolower(str_replace(' ', '_', $tipoBeca))]);
}

    public function render()
    {
        return view('livewire.becas.beca-seleccion');
    }

}
