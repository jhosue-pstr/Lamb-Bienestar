<?php

namespace Database\Seeders;

use App\Models\Atenciones;
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
        $this->call(FamiliaresEstudiantesSeeder::class);
        $this->call(EstudiantesSeeder::class);
        //$this->call(BecasSeeder::class);
        //$this->call(SolicitudesSeeder::class);
        $this->call(AtencionesSeeder::class);
        $this->call(CitaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(HistorialsSeeder::class);

    }
}
