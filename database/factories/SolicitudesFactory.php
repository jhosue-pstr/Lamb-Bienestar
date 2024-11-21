<?php

namespace Database\Factories;

use App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solicitudes>
 */
class SolicitudesFactory extends Factory
{
    protected $model = Solicitudes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,  // Aquí puedes agregar más campos si es necesario
            // Agrega más campos si la tabla de 'solicitudes' los tiene
        ];
    }
}
