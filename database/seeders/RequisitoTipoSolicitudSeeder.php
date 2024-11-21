<?php

namespace Database\Seeders;

use App\Models\RequisitoTipoSolicitud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequisitoTipoSolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RequisitoTipoSolicitud::create([
            'requisito_id' => 1,
            'tipo_solicitud_id' => 1,
            'es_obligatorio' => true,
            'notas' => 'Requisito obligatorio para la solicitud',
        ]);

        RequisitoTipoSolicitud::create([
            'requisito_id' => 2,
            'tipo_solicitud_id' => 1,
            'es_obligatorio' => true,
            'notas' => 'Requisito obligatorio para la solicitud',
        ]);

        RequisitoTipoSolicitud::create([
            'requisito_id' => 3,
            'tipo_solicitud_id' => 2,
            'es_obligatorio' => false,
            'notas' => 'Requisito opcional',
        ]);

        RequisitoTipoSolicitud::create([
            'requisito_id' => 1,
            'tipo_solicitud_id' => 2,
            'es_obligatorio' => true,
            'notas' => 'Requisito obligatorio para la solicitud',
        ]);

    }
}
