<?php

namespace Database\Factories;

use App\Models\Recordatorio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recordatorio>
 */
class RecordatorioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Recordatorio::class;

    public function definition(): array
    {
        return [
            'tipo' => $this->faker->word, // Tipo aleatorio
            'nombre' => $this->faker->word, // Nombre aleatorio
            'ubicacion' => $this->faker->address, // Ubicación aleatoria
            'fecha' => $this->faker->date(), // Fecha aleatoria
            'hora' => $this->faker->time(), // Hora aleatoria
            'descripcion' => $this->faker->paragraph, // Descripción aleatoria
        ];
    }
}
