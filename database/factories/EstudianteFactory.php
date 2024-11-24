<?php

namespace Database\Factories;

use App\Models\Cita;
use App\Models\Historial;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->numerify('E-####'),
            'nombre' => $this->faker->firstName(),
            'apellidoPaterno' => $this->faker->lastName(),
            'apellidoMaterno' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->numerify('#########'),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'escuela' => $this->faker->word(),
            'facultad' => $this->faker->word(),                        // Genera una facultad aleatoria
            'user_id'=>User::all()->random()->id,                                // Relación con el modelo User (crea un User relacionado)
        ];
    }
}
