<?php

namespace Database\Factories;

use App\Models\AlimentoBeca;
use App\Models\TipoBeca;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlimentoBeca>
 */
class AlimentoBecaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = AlimentoBeca::class;

    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->word,
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'idTipoBeca' => TipoBeca::factory(), // Genera un tipo de beca aleatorio
        ];
    }
}
