<?php

namespace Database\Factories;

use App\Models\Atenciones;
use App\Models\Cita;
use App\Models\Estudiantes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atenciones>
 */
class AtencionesFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Atenciones::class;

    public function definition()
    {
        //$cita = Cita::inRandomOrder()->first();

        return [
            'motivo de atencion' => $this->faker->sentence(),
            'tipo' => $this->faker->word(),
            'resposable' => $this->faker->name(),
            'fecha atencion' => $this->faker->date(),
            'numero derivaciones' => $this->faker->numberBetween(1, 10),
            'descripcion motivo' => $this->faker->text(255),
            'observaciones' => $this->faker->sentence(),
            'seguimiento de caso' => $this->faker->sentence(),
            'estado' => $this->faker->randomElement(['Pendiente', 'Atendido', 'Cancelado']),
            'ingreso' => $this->faker->boolean(),
            'otros datos' => $this->faker->text(),
            'estudiante_id' => Estudiantes::inRandomOrder()->first()?->id ?? 1, // Relacionado con el estudiante
        ];
    }
}
