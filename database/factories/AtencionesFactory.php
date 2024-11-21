<?php

namespace Database\Factories;

use App\Models\Atenciones;
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
        return [
            'motivo de atencion' => $this->faker->word,
            'tipo' => $this->faker->word,
            'resposable' => $this->faker->name,
            'fecha atencion' => $this->faker->date(),
            'numero derivaciones' => $this->faker->randomNumber(3),
            'descripcion motivo' => $this->faker->sentence,
            'observaciones' => $this->faker->sentence,
            'seguimiento de caso' => $this->faker->sentence,
            'otros datos' => $this->faker->sentence,
            'estudiante_id' => Estudiantes::factory(),
        ];
    }
}
