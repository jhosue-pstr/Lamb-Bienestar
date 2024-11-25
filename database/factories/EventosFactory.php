<?php

namespace Database\Factories;

use App\Models\Eventos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eventos>
 */
class EventosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Eventos::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'ubicacion' => $this->faker->address,
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'descripcion' => $this->faker->paragraph,
            'afiche' => $this->faker->url,
            'tipo' => $this->faker->randomElement(['carrera', 'todos']),

        ];
    }
}
