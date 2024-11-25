<?php

namespace Database\Factories;

use App\Models\Atencion;
use App\Models\Atenciones;
use App\Models\Cita;
use App\Models\Estudiante;
use App\Models\Historial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Historial>
 */
class HistorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Historial::class;
    public function definition(): array
    {
        return [
            'idAtencion' => Atenciones::inRandomOrder()->first()->id, // Asigna un Atencion aleatoria
            'idCita' => Cita::inRandomOrder()->first()->id, // Asigna una Cita aleatoria
            'idEstudiante' => Estudiante::inRandomOrder()->first()->id, // Asigna un Estudiante aleatorio
        ];
    }
}
