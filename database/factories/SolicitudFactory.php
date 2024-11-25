<?php

namespace Database\Factories;

use App\Models\AlimentoBeca;
use App\Models\Beca;
use App\Models\Estudiante;
use App\Models\Solicitud;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solicitud>
 */
class SolicitudFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Solicitud::class;

    public function definition(): array
    {
        return [
            'tipo' => $this->faker->randomElement(['Beca', 'Alimento', 'Beca y Alimento']),
            'idEstudiante' => Estudiante::inRandomOrder()->first()->id, // Selecciona un Estudiante aleatorio
            'idBeca' => Beca::inRandomOrder()->first()->id, // Selecciona una Beca aleatoria
            'idAlimentoBeca' => AlimentoBeca::inRandomOrder()->first()->id, // Selecciona un AlimentoBeca aleatorio
        ];
    }
}
