<?php

namespace Database\Factories;

use App\Models\Becas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Becas>
 */
class BecasFactory extends Factory
{
    protected $model = Becas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,  // Aquí puedes agregar más campos si es necesario
            // Agrega más campos si la tabla de 'becas' los tiene
        ];
    }
}
