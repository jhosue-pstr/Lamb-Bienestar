<?php

namespace Database\Factories;

use App\Models\Atenciones;
use App\Models\Estudiantes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Historials>
 */
class HistorialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Historials::class;

    public function definition()
    {
        return [
            'tipo' => $this->faker->word, // Aquí pones un tipo genérico, si lo tienes bien
            'descripcion' => $this->faker->sentence,
            'estudiantes_id' => Estudiantes::factory(), // Relación con Estudiantes
            'atenciones_id' => Atenciones::factory(), // Relación con Atenciones
            'solicitudes_id' => null, // Dejamos vacío, ya que no hay registros de solicitudes aún
            'becas_id' => null, // Dejamos vacío, ya que no hay registros de becas aún
        ];
    }
}
