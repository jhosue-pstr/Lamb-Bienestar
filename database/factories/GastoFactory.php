<?php

namespace Database\Factories;

use App\Models\Gasto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gasto>
 */
class GastoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Gasto::class;

    public function definition(): array
    {
        return [
            'vivienda' => $this->faker->randomFloat(2, 100, 1000), // Genera un valor decimal entre 100 y 1000
            'alimentacion' => $this->faker->randomFloat(2, 50, 500), // Genera un valor decimal entre 50 y 500
            'educacion' => $this->faker->randomFloat(2, 30, 400), // Genera un valor decimal entre 30 y 400
            'movilidad' => $this->faker->randomFloat(2, 20, 200), // Genera un valor decimal entre 20 y 200
            'salud' => $this->faker->randomFloat(2, 10, 300), // Genera un valor decimal entre 10 y 300
            'otrosGastos' => $this->faker->randomFloat(2, 0, 100), // Genera un valor decimal entre 0 y 100
            'pagoServicio' => $this->faker->randomFloat(2, 50, 400), // Genera un valor decimal entre 50 y 400
            'otros' => $this->faker->randomFloat(2, 10, 150), // Genera un valor decimal entre 10 y 150
            'datoAdicional' => $this->faker->sentence(6), // Genera una cadena de texto de 6 palabras
        ];
    }
}
