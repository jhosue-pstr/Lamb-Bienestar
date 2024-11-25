<?php

namespace Database\Factories;

use App\Models\LugarNacimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LugarNacimiento>
 */
class LugarNacimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = LugarNacimiento::class;

     public function definition(): array
    {
        return [
            'departamento' => $this->faker->word, // Departamento aleatorio
            'provincia' => $this->faker->word, // Provincia aleatoria
            'distrito' => $this->faker->word, // Distrito aleatorio
        ];
    }
}
