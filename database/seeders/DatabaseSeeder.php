<?php

namespace Database\Seeders;

use App\Models\Atenciones;
use App\Models\FichaSocioEconomica;
use App\Models\TipoRequisito;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GastoSeeder::class);
        $this->call(TipoBecaSeeder::class); // Primero, seedear las becas
        $this->call(AlimentoBecaSeeder::class); // Luego, los alimentos relacionados con becas
        $this->call(BecaSeeder::class); // Después las becas
        $this->call(LugarNacimientoSeeder::class); // Luego, los lugares de nacimiento
        $this->call(EstudianteSeeder::class); // Los estudiantes, que dependen del lugar de nacimiento
        $this->call(SituacionViviendaSeeder::class); // Luego, la situación de vivienda
        $this->call(SituacionSaludSeeder::class); // Luego, la situación de salud
        $this->call(EconomiaFamiliarSeeder::class); // Luego, la economía familiar
        $this->call(FichaSocioEconomicaSeeder::class); // Ficha socioeconómica que depende de los anteriores
        $this->call(AtencionesSeeder::class); // Luego, las atenciones de los estudiantes

        $this->call(CitaSeeder::class); // Las citas que también dependen de los estudiantes
        $this->call(HistorialSeeder::class); // Historial de atenciones y citas
        $this->call(SolicitudSeeder::class); // Solicitudes que dependen de los estudiantes y becas
        $this->call(VerificacionRequisitoSeeder::class); // Verificación de requisitos
        $this->call(DocumentoSeeder::class); // Documentos, que dependen de estudiantes y solicitudes
        $this->call(RecordatorioSeeder::class); // Recordatorios
        $this->call(AnuncioSeeder::class); // Anuncios
        $this->call(EventosSeeder::class); // Eventos
        $this->call(FamiliarSeeder::class); // Familiares
        $this->call(TipoRequisitoSeeder::class);
    }
}
