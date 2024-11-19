<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => User::factory(), // Crea un usuario relacionado o selecciona uno existente
            'type' => $this->faker->randomElement(['Consulta', 'Terapia', 'Asesoría']), // Personaliza según los tipos que manejes
            'scheduled_date' => $this->faker->dateTimeBetween('+1 day', '+2 weeks'), // Cita entre mañana y dos semanas
            'duration' => $this->faker->time('H:i:s', '01:00:00'), // Duración estándar de 1 hora
            'staff_name' => $this->faker->name, // Nombre ficticio del encargado
            'area' => $this->faker->randomElement(['Psicología', 'Nutrición', 'Bienestar social']), // Área específica
            'location' => $this->faker->randomElement(['Oficina 1', 'Sala 2', 'Virtual']), // Lugar de la cita
            'reason' => $this->faker->sentence(10), // Razón descriptiva breve
            'initiative' => $this->faker->randomElement(['Estudiante', 'Tutor', 'Docente']), // Quién inició la cita
            'next_appointment' => $this->faker->dateTimeBetween('+2 weeks', '+1 month')->format('Y-m-d H:i:s'), // Próxima cita
            'status' => $this->faker->randomElement(['pending', 'attended', 'missed']), //Estado
        ];
    }
}
