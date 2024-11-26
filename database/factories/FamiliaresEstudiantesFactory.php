<?php

namespace Database\Factories;

use App\Models\FamiliaresEstudiantes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamiliaresEstudiantes>
 */
class FamiliaresEstudiantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = FamiliaresEstudiantes::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'edad' => $this->faker->numberBetween(40, 70),
            'correo' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'parentesco' => $this->faker->randomElement(['padre', 'madre', 'tío', 'tía']),
        ];
    }
}
