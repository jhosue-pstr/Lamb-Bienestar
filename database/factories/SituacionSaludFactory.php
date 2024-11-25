<?php

namespace Database\Factories;

use App\Models\SituacionSalud;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SituacionSalud>
 */
class SituacionSaludFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SituacionSalud::class;
    public function definition(): array
    {
        return [
            'salud' => $this->faker->word,
            'observaciones' => $this->faker->text(200),
            'atencionEnfermedad' => $this->faker->word,
            'seguro' => $this->faker->word,
            'enfermedadPermanente' => $this->faker->boolean,
            'nombreEnfermedad' => $this->faker->word,
            'familiarEnfermo' => $this->faker->boolean,
        ];
    }
}
