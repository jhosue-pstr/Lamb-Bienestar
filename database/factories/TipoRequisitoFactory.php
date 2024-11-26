<?php

namespace Database\Factories;

use App\Models\FichaSocioEconomica;
use App\Models\TipoRequisito;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoRequisito>
 */
class TipoRequisitoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TipoRequisito::class;

    public function definition(): array
    {
        $fichaSocioEconomica = FichaSocioEconomica::inRandomOrder()->first();

    // Si no existe, crea uno nuevo
    if (!$fichaSocioEconomica) {
        $fichaSocioEconomica = FichaSocioEconomica::factory()->create();
    }

    return [
        'nombre' => $this->faker->randomElement([
                'Constancia de haber ocupado uno de los dos primeros puestos en el ranking académico',
                'Solicitud dirigida a la Comisión de Becas',
                'Certificado de discapacidad emitido por el Ministerio de Salud o carnet CONADIS',
                'Constancia de calificación como "Deportista de Alto Nivel"',
                'Oficio que acredite el primer lugar en el cómputo general del proceso de admisión',
                'Ficha socioeconómica',
                'Promedio ponderado mínimo de 14 y 100% de créditos aprobados',
                'No adeudar a la UPeU',
                'No haber sido sancionado',
            ]),
        'descripcion' => $this->faker->sentence,
        'idFichaSocioEconomica' => $fichaSocioEconomica->id,
    ];
    }
}
