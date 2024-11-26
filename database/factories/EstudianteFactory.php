<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    protected $model = Estudiante::class;

    public function definition()
    {
        return [
            'codigo' => $this->faker->unique()->randomNumber(6),
            'nombre' => $this->faker->firstName,
            'apellidoPaterno' => $this->faker->lastName,
            'apellidoMaterno' => $this->faker->lastName,
            'edad' => $this->faker->numberBetween(18, 35),
            'direccion' => $this->faker->address,
            'sexo' => $this->faker->boolean,
            'facultad' => $this->faker->word,
            'escuela' => $this->faker->word,
            'telefono' => $this->faker->phoneNumber,
            'dni' => $this->faker->unique()->numerify('########'),
            'ciclo' => $this->faker->randomElement(['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X']),
            'correo' => $this->faker->unique()->safeEmail,
            'estadoCivil' => $this->faker->randomElement(['Soltero', 'Casado', 'Divorciado']),
            'fechaNacimiento' => $this->faker->date('Y-m-d', '2005-01-01'),
            'domicilio' => $this->faker->boolean,
        ];
    }
}
