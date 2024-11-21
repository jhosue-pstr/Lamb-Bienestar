<?php

namespace Database\Seeders;

use App\Models\Atenciones;
use App\Models\Estudiantes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estudiantes::factory(10)->create()->each(function ($estudiante) {
            // Para cada estudiante, creamos un número aleatorio de atenciones
            Atenciones::factory(rand(1, 5))->create([
                'estudiante_id' => $estudiante->id, // Asociar la atención con el estudiante
            ]);
        });
    }
}
