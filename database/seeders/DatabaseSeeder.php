<?php

namespace Database\Seeders;

use App\Models\CategoriaSolicitud;
use App\Models\Estudiante;
use App\Models\User;
use Database\Factories\EstudianteFactory;
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
        $this->call(EstudianteSeeder::class);
        $this->call(TipoRequisitoSeeder::class);
        $this->call(TipoBecaSeeder::class); // Primero, seedear las becas
        $this->call(AlimentoBecaSeeder::class); // Luego, los alimentos relacionados con becas
        $this->call(BecaSeeder::class); // Después las becas
        $this->call(EconomiaFamiliarSeeder::class); // Luego, la economía familiar
        $this->call(FichaSocioEconomicaSeeder::class); // Ficha socioeconómica que depende de los anteriores
        $this->call(SolicitudSeeder::class); // Solicitudes que dependen de los estudiantes y becas
        $this->call(VerificacionRequisitoSeeder::class); // Verificación de requisitos
        $this->call(DocumentoSeeder::class); // Documentos, que dependen de estudiantes y solicitudes
        $this->call(FamiliarSeeder::class); // Familiares










    }
}
