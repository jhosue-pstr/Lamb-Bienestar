<?php

namespace Database\Factories;

use App\Models\Documentos;
use App\Models\Estudiante;
use App\Models\FichaSocioEconomica;
use App\Models\Solicitud;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documento>
 */
class DocumentosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Documentos::class;

    public function definition(): array
    {
        return [
            'idEstudiante' => Estudiante::factory(), // Crea un estudiante aleatorio
            'idFichaSocioEconomica' => FichaSocioEconomica::factory(), // Crea una ficha socioeconómica aleatoria
            'idSolicitud' => Solicitud::factory(), // Crea una solicitud aleatoria
        ];
    }
}
