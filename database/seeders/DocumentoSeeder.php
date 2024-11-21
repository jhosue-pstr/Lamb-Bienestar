<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Documento::create([
            'nombre' => 'documento_informe.pdf',
            'tipo' => 'pdf',
            'ruta' => '/uploads/informes/documento_informe.pdf',
            'usuario_id' => 1, // Relación con usuario (ID 1)
            'estado_id' => 1, // Relación con estado 'activo' (ID 1)
        ]);

        Documento::create([
            'nombre' => 'contrato_renovacion.docx',
            'tipo' => 'docx',
            'ruta' => '/uploads/contratos/contrato_renovacion.docx',
            'usuario_id' => 2, // Relación con usuario (ID 2)
            'estado_id' => 2, // Relación con estado 'inactivo' (ID 2)
        ]);

        Documento::create([
            'nombre' => 'factura_julio.xlsx',
            'tipo' => 'xlsx',
            'ruta' => '/uploads/facturas/factura_julio.xlsx',
            'usuario_id' => 3, // Relación con usuario (ID 3)
            'estado_id' => 3, // Relación con estado 'eliminado' (ID 3)
        ]);

        Documento::create([
            'nombre' => 'certificado_aseguradora.pdf',
            'tipo' => 'pdf',
            'ruta' => '/uploads/certificados/certificado_aseguradora.pdf',
            'usuario_id' => 1, // Relación con usuario (ID 1)
            'estado_id' => 1, // Relación con estado 'activo' (ID 1)
        ]);

        Documento::create([
            'nombre' => 'documento_administrativo.docx',
            'tipo' => 'docx',
            'ruta' => '/uploads/documentos/documento_administrativo.docx',
            'usuario_id' => 2, // Relación con usuario (ID 2)
            'estado_id' => 4, // Relación con estado 'pendiente' (ID 4)
        ]);
    }
}
