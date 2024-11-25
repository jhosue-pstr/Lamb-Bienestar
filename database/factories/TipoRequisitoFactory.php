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
        'nombre' => $this->faker->word,
        'descripcion' => $this->faker->sentence,
        'idFichaSocioEconomica' => $fichaSocioEconomica->id,
    ];
    }
}
