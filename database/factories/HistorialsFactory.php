<?php

namespace Database\Factories;

use App\Models\Atenciones;
use App\Models\Becas;
use App\Models\Cita;
use App\Models\Estudiantes;
use App\Models\Solicitudes;
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
            'tipo' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'estudiantes_id' => Estudiantes::inRandomOrder()->first()->id,
            'numero_atenciones' => $this->faker->numberBetween(0, 10),
            'idCita' => Cita::inRandomOrder()->first()->id,
            'solicitudes_id' => $this->faker->randomElement([Solicitudes::inRandomOrder()->first()?->id, null]),
            'becas_id' => $this->faker->randomElement([Becas::inRandomOrder()->first()?->id, null]),
        ];
    }
}
