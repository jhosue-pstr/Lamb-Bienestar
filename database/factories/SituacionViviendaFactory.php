<?php

namespace Database\Factories;

use App\Models\SituacionVivienda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SituacionVivienda>
 */
class SituacionViviendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = SituacionVivienda::class;
    public function definition(): array
    {
        return [
            'departamento' => $this->faker->word,
            'provincia' => $this->faker->word,
            'distrito' => $this->faker->word,
            'direccion' => $this->faker->address,
            'referencia' => $this->faker->word,
            'tenenciaDomicilio' => $this->faker->word,
            'servicioComplementarioBienes' => $this->faker->word,
            'tipoVivienda' => $this->faker->word,
            'materialConstruccion' => $this->faker->word,
            'servicioBasico' => $this->faker->word,
            'servicioComplementario' => $this->faker->word,
            'numeroPisos' => $this->faker->numberBetween(1, 3),
            'numeroHabitaciones' => $this->faker->numberBetween(1, 5),
            'areaResidencia' => $this->faker->word,
            'bienes' => $this->faker->word,
            'vehiculo' => $this->faker->url(),
            'modelo' => $this->faker->word,
            'año' => $this->faker->year,
        ];
    }
}
