<?php

namespace Database\Factories;

use App\Models\Atencion;
use App\Models\Atenciones;
use App\Models\Estudiante;
use App\Models\Estudiantes;
use App\Models\FamiliaresEstudiante;
use App\Models\FamiliaresEstudiantes;
use App\Models\LugarNacimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiantes>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Estudiante::class;

    public function definition()
    {
        return [
            'codigo' => $this->faker->unique()->randomNumber(8), // Código único aleatorio
            'nombre' => $this->faker->firstName, // Nombre aleatorio
            'apellidoPaterno' => $this->faker->lastName, // Apellido paterno aleatorio
            'apellidoMaterno' => $this->faker->lastName, // Apellido materno aleatorio
            'edad' => $this->faker->numberBetween(18, 30), // Edad aleatoria entre 18 y 30
            'direccion' => $this->faker->address, // Dirección aleatoria
            'sexo' => $this->faker->boolean, // Sexo aleatorio (true o false)
            'facultad' => $this->faker->word, // Facultad aleatoria
            'escuela' => $this->faker->word, // Escuela aleatoria
            'telefono' => $this->faker->phoneNumber, // Número de teléfono aleatorio
            'dni' => $this->faker->unique()->numerify('########'), // DNI único
            'ciclo' => $this->faker->word, // Ciclo aleatorio
            'correo' => $this->faker->unique()->safeEmail, // Correo electrónico aleatorio
            'estadoCivil' => $this->faker->randomElement(['Soltero', 'Casado', 'Divorciado', 'Viudo']), // Estado civil aleatorio
            'fechaNacimiento' => $this->faker->date, // Fecha de nacimiento aleatoria
            'domicilio' => $this->faker->boolean, // Domicilio (true o false)
            'idLugarNacimiento' => LugarNacimiento::factory(), // Genera un LugarNacimiento relacionado
        ];
    }
}
