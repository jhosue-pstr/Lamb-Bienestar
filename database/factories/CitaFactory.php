<?php

namespace Database\Factories;

use App\Models\Cita;
use App\Models\Estudiante;
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
            'area' => $this->faker->randomElement(['Psicologia','Centro Medico','Capellania','Atencion Medica','Sostenibilidad ambiental']),
            'estado' => $this->faker->randomElement(['asistio', 'no asistio', 'pendiente']),
            'motivo' => $this->faker->sentence(),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'estudiante_id' => Estudiante::inRandomOrder()->first()->id, // Relacionado con el estudiante
        ];
    }
}
