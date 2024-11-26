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
            'semestre' => $this->faker->randomElement(['Regular 2024-1', 'Regular 2024-2', 'Verano 2024']), // Datos simulados para semestre
            'plan' => $this->faker->randomElement(['EP Ingeniería de Sistemas', 'EP Derecho', 'EP Medicina']), // Datos simulados para programa
            'plan_programa' => $this->faker->randomElement(['2023-1', '2023-2', '2024-1']), // Datos simulados para programa
            'estado' => $this->faker->randomElement(['Pendiente', 'Aprobado', 'Rechazado']), // Datos simulados para estado
        ];

    }
}
