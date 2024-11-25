<?php

namespace Database\Factories;

use App\Models\TipoBeca;
use App\Models\TipoRequisito;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoBeca>
 */
class TipoBecaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = TipoBeca::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(), // Genera un nombre aleatorio
            'detalle' => $this->faker->paragraph(), // Genera una descripción aleatoria
            'idTipoRequisito' => TipoRequisito::factory(), // Asocia un TipoRequisito generado
        ];
    }
}
