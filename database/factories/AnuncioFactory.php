<?php

namespace Database\Factories;

use App\Models\Anuncio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anuncio>
 */
class AnuncioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Anuncio::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word, // Nombre del anuncio (palabra aleatoria)
            'ubicacion' => $this->faker->address, // Ubicación aleatoria
            'fecha' => $this->faker->date(), // Fecha aleatoria
            'hora' => $this->faker->time(), // Hora aleatoria
            'descripcion' => $this->faker->paragraph, // Descripción aleatoria
            'afiche' => $this->faker->url, // URL aleatoria para el afiche
        ];
    }
}
