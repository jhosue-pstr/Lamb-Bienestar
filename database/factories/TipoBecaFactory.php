<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,  // Genera un nombre falso
            'detalle' => $this->faker->text,  // Genera un detalle falso
            'idTipoRequisito' => \App\Models\TipoRequisito::factory(), //
        ];
    }
}
