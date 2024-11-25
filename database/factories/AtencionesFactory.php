<?php

namespace Database\Factories;

use App\Models\Atenciones;
use App\Models\Estudiante;
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
            'motivoAtencion' => $this->faker->sentence,
            'tipo' => $this->faker->word,
            'responsable' => $this->faker->name,
            'fechaAtencion' => $this->faker->date(),
            'derivacion' => $this->faker->word,
            'descripcionMotivo' => $this->faker->paragraph,
            'lesionObservaciones' => $this->faker->paragraph,
            'seguimientoCaso' => $this->faker->paragraph,
            'otrosDatos' => $this->faker->paragraph,
            'idEstudiante' => Estudiante::factory(), // Relacionado con un Estudiante creado por la factory
        ];


    }
}
