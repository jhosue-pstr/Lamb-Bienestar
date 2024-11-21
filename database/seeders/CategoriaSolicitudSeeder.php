<?php

namespace Database\Seeders;

use App\Models\CategoriaSolicitud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaSolicitud::create([
            'nombre' => 'Chequeo Médico',
            'descripcion' => 'Gestión de solicitudes para chequeos médicos',
            'estado_id' => 1, // Asume que "Activo" tiene ID 1 en la tabla estados
        ]);

        CategoriaSolicitud::create([
            'nombre' => 'Alimentación',
            'descripcion' => 'Gestión de solicitudes para beneficios de alimentación',
            'estado_id' => 1,
        ]);

        CategoriaSolicitud::create([
            'nombre' => 'Becas',
            'descripcion' => 'Gestión de solicitudes para becas académicas',
            'estado_id' => 1,
        ]);
    }
}
