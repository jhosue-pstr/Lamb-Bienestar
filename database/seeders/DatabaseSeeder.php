<?php

namespace Database\Seeders;

use App\Models\Cita;
use App\Models\CitaCalificacion;
use App\Models\Estudiante;
use App\Models\Historial;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);


        Estudiante::factory(10)->create();
        Cita::factory(10)->create();
        CitaCalificacion::factory()->count(10)->create();
    }
}
