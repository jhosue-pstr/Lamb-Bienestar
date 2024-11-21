<?php

namespace Database\Factories;

use App\Models\Atencion;
use App\Models\Atenciones;
use App\Models\Estudiantes;
use App\Models\FamiliaresEstudiante;
use App\Models\FamiliaresEstudiantes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiantes>
 */
class EstudiantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Estudiantes::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'edad' => $this->faker->numberBetween(18, 30),
            'direccion' => $this->faker->address,
            'codigo' => $this->faker->randomNumber(5),
            'sexo' => $this->faker->boolean,
            'facultad' => $this->faker->word,
            'escuela' => $this->faker->word,
            'telefono' => $this->faker->phoneNumber,
            'DNI' => $this->faker->numberBetween(10000000, 99999999),
            'ciclo' => $this->faker->word,
            'correo' => $this->faker->unique()->safeEmail,
            'estado civil' => $this->faker->randomElement(['soltero', 'casado']),
            'fecha de nacimiento' => $this->faker->date(),
            'domicilio' => $this->faker->boolean,
            'familiares_estudiantes_id' => FamiliaresEstudiantes::factory(),

        ];
    }
}
