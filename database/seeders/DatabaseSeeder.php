<?php

namespace Database\Seeders;

use App\Models\CategoriaSolicitud;
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
        $this->call(EstadoSeeder::class);
        $this->call(CategoriaSolicitudSeeder::class);
        $this->call(TipoSolicitudSeeder::class);
        $this->call(TipoRequisitoSeeder::class);
        $this->call(RequisitoTipoSolicitudSeeder::class);
        $this->call(DocumentoSeeder::class);
        $this->call(AnalisisDocumentoSeeder::class);







    }
}
