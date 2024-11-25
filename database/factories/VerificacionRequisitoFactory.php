<?php

namespace Database\Factories;

use App\Models\Solicitud;
use App\Models\TipoRequisito;
use App\Models\VerificacionRequisito;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VerificacionRequisito>
 */
class VerificacionRequisitoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = VerificacionRequisito::class;

    public function definition(): array
    {
        return [
            'idSolicitud' => Solicitud::inRandomOrder()->first()->id, // Selecciona una solicitud aleatoria
            'idRequisito' => TipoRequisito::inRandomOrder()->first()?->id, // Selecciona un requisito aleatorio
            'cumplido' => $this->faker->boolean(), // Valor aleatorio para cumplido (true o false)
            'observaciones' => $this->faker->optional()->paragraph(), // Genera una observación aleatoria o NULL
        ];
    }
}
