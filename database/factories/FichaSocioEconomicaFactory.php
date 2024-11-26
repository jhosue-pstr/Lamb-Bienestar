<?php

namespace Database\Factories;

use App\Models\EconomiaFamiliar;
use App\Models\Estudiante;
use App\Models\FichaSocioEconomica;
use App\Models\SituacionSalud;
use App\Models\SituacionVivienda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FichaSocioEconomica>
 */
class FichaSocioEconomicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = FichaSocioEconomica::class;

    public function definition(): array
    {
        return [
            'idEconomiaFamiliar' => EconomiaFamiliar::factory(), // Asegura que se cree un modelo EconomiaFamiliar
          //  'idSituacionVivienda' => SituacionVivienda::factory(), // Asegura que se cree un modelo SituacionVivienda
           // 'idSituacionSalud' => SituacionSalud::factory(), // Asegura que se cree un modelo SituacionSalud
            //'idEstudiante' => Estudiante::factory(), // Asegura que se cree un modelo Estudiante
        ];
    }
}
