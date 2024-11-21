<?php

namespace Database\Seeders;

use App\Models\TipoRequisito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoRequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoRequisito::create([
            'nombre_requisito' => 'Copia del DNI',
            'descripcion' => 'Documento Nacional de Identidad del solicitante',
            'estado_id' => 1, // Asume que "Activo" tiene ID 1
        ]);

        TipoRequisito::create([
            'nombre_requisito' => 'Certificado de Estudios',
            'descripcion' => 'Certificación oficial de calificaciones',
            'estado_id' => 1,
        ]);

        TipoRequisito::create([
            'nombre_requisito' => 'Constancia de Trabajo',
            'descripcion' => 'Documento que acredite relación laboral',
            'estado_id' => 1,
        ]);

        TipoRequisito::create([
            'nombre_requisito' => 'Copia de Recibo de Luz o Agua',
            'descripcion' => 'Para verificar dirección del solicitante',
            'estado_id' => 1,
        ]);
    }
}
