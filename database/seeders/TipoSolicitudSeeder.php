<?php

namespace Database\Seeders;

use App\Models\TipoSolicitud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoSolicitud::create([
            'nombre' => 'Chequeo General',
            'tipo_de_requerimientos' => 5,
            'categoria_id' => 1,
            'estado_id' => 1,
        ]);

        TipoSolicitud::create([
            'nombre' => 'Chequeo Especializado',
            'tipo_de_requerimientos' => 3,
            'categoria_id' => 1,
            'estado_id' => 1,
        ]);

        TipoSolicitud::create([
            'nombre' => 'Exámenes Médicos',
            'tipo_de_requerimientos' => 4,
            'categoria_id' => 1,
            'estado_id' => 1,
        ]);

        TipoSolicitud::create([
            'nombre' => 'Solicitud de Desayuno',
            'tipo_de_requerimientos' => 2,
            'categoria_id' => 2,
            'estado_id' => 1,
        ]);

        TipoSolicitud::create([
            'nombre' => 'Solicitud de Almuerzo',
            'tipo_de_requerimientos' => 2,
            'categoria_id' => 2,
            'estado_id' => 1,
        ]);

        TipoSolicitud::create([
            'nombre' => 'Solicitud de Cena',
            'tipo_de_requerimientos' => 2,
            'categoria_id' => 2,
            'estado_id' => 1,
        ]);

        TipoSolicitud::create([
            'nombre' => 'Reevaluación de Beneficio',
            'tipo_de_requerimientos' => 1,
            'categoria_id' => 2,
            'estado_id' => 1,
        ]);

        // Tipos de Solicitud para la Categoría: Becas
        TipoSolicitud::create([
            'nombre' => 'Beca Académica',
            'tipo_de_requerimientos' => 3,
            'categoria_id' => 3, // ID de la categoría "Becas"
            'estado_id' => 1,
        ]);

        TipoSolicitud::create([
            'nombre' => 'Beca Deportiva',
            'tipo_de_requerimientos' => 3,
            'categoria_id' => 3,
            'estado_id' => 1,
        ]);

        TipoSolicitud::create([
            'nombre' => 'Beca Cultural',
            'tipo_de_requerimientos' => 2,
            'categoria_id' => 3,
            'estado_id' => 1,
        ]);

        TipoSolicitud::create([
            'nombre' => 'Renovación de Beca',
            'tipo_de_requerimientos' => 1,
            'categoria_id' => 3,
            'estado_id' => 1,
        ]);
    }
}
