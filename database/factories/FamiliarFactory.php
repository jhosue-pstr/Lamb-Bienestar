<?php

namespace Database\Factories;

use App\Models\Familiar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Familiar>
 */
class FamiliarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Familiar::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'estadoCivil' => $this->faker->randomElement(['Soltero', 'Casado', 'Divorciado', 'Viudo']),
            'gradoInstruccion' => $this->faker->randomElement(['Primaria', 'Secundaria', 'Superior', 'Universitaria']),
            'ocupacion' => $this->faker->word(),
            'edad' => $this->faker->numberBetween(18, 80),
            'correo' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'parentesco' => $this->faker->randomElement(['Padre', 'Madre', 'Hermano', 'Hermana', 'Abuelo', 'Abuela']),
            'enfermedad' => $this->faker->word, // Puedes usar "null" si no quieres que tenga enfermedad
        ];
    }
}
