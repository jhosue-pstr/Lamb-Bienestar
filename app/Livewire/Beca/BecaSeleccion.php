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
                    'No haber sido sancionado.',
                    'No adeudar a la UPeU.',
                    'Ficha socioeconómica.',
                ],
                'icono' => 'https://example.com/icons/convenio-icon.png',
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
                    'No haber sido sancionado.',
                    'No adeudar a la UPeU.',
                    'Ficha socioeconómica.',
                ],
                'icono' => 'https://example.com/icons/deportista-icon.png',
            ],
            [
                'nombre' => 'Beca Socioeconómica (BECA CREAF)',
                'descripcion' => 'Apoyo para estudiantes con carencias económicas.',
                'requisitos' => [
                    'Solicitud dirigida a la Comisión de Becas.',
                    'Ser estudiante regular en el semestre académico.',
                    'Promedio ponderado mínimo de 14 y 100% de créditos aprobados.',
                    'No haber sido sancionado.',
                    'No adeudar a la UPeU.',
                    'Estar apto para cursar el tercer ciclo.',
                    'Ficha socioeconómica.',
                    'Documentos adicionales según evaluación de Asistencia Social.',
                ],
                'icono' => 'https://example.com/icons/socioeconomica-icon.png',
            ],
            [
                'nombre' => 'Beca Discapacidad',
                'descripcion' => 'Apoyo para estudiantes con discapacidad certificada.',
                'requisitos' => [
                    'Solicitud dirigida a la Comisión de Becas.',
                    'Certificado de discapacidad emitido por el Ministerio de Salud o carnet CONADIS.',
                    'Ser estudiante regular en el semestre académico.',
                    'Promedio ponderado mínimo de 14 y 100% de créditos aprobados.',
                    'No haber sido sancionado.',
                    'No adeudar a la UPeU.',
                    'Ficha socioeconómica.',
                    'Documentos adicionales requeridos por Asistencia Social.',
                ],
                'icono' => 'https://example.com/icons/discapacidad-icon.png',
            ],
            [
                'nombre' => 'Beca Primer Puesto en el Examen de Admisión',
                'descripcion' => 'Reconocimiento a estudiantes que ocupan el primer puesto en el cómputo general del examen de admisión.',
                'requisitos' => [
                    'Oficio que acredite el primer lugar en el cómputo general del proceso de admisión.',
                    'Solicitud dirigida a la Comisión de Becas.',
                    'Ficha socioeconómica.',
                    'Constancia de no haber recibido sanciones disciplinarias.',
                    'Constancia de no adeudar a la UPeU.',
                    'Promedio ponderado mínimo de 14 y 100% de créditos aprobados.',
                ],
                'icono' => 'https://example.com/icons/admission-icon.png',
            ],

        ];
    }
    public function render()
    {
        return view('livewire.becas.beca-seleccion');
    }

}
