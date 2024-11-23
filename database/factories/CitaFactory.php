<?php

namespace Database\Factories;

use App\Models\Cita;
use App\Models\Estudiantes;
use App\Models\Historials;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{

    protected $model = Cita::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'area' => $this->faker->word(),
            'estado' => $this->faker->randomElement(['Pendiente', 'Confirmada', 'Cancelada']),
            'motivo' => $this->faker->sentence(),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'atenciones_id' => \App\Models\Atenciones::inRandomOrder()->first()->id, // Relacionado con el historial
            'estudiante_id' => Estudiantes::inRandomOrder()->first()->id, // Relacionado con el estudiante
        ];
    }
}
