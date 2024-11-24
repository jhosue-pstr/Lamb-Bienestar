<?php

namespace Database\Factories;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CitaCalificacion>
 */
class CitaCalificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cita_id'=>Cita::all()->random()->id,
            'calificacion' => $this->faker->numberBetween(1, 5),  // Calificación aleatoria entre 1 y 5
            'comentario' => $this->faker->sentence,  // Un comentario aleatorio
        ];
    }
}
