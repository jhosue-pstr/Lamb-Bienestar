<?php

namespace Database\Seeders;

use App\Models\Historials;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Verifica si existen registros de solicitudes en la tabla
        $solicitudId = 1; // Usamos un valor ficticio o el ID de un registro existente si es necesario

        // Crea 10 registros de historial
        Historials::factory(10)->create([
            'solicitudes_id' => null,  // Asignar null si no tienes datos de solicitudes
            'becas_id' => null,  // Asignar null si no tienes datos de becas
        ]);
    }
}
