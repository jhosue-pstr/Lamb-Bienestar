<?php

namespace Database\Seeders;

use App\Models\AnalisisDocumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnalisisDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnalisisDocumento::create([
            'documento_id' => 1, // Suponiendo que el documento con ID 1 existe
            'usuario_id' => 1, // Suponiendo que el usuario con ID 1 existe
            'comentarios' => 'Documento aprobado tras revisión.',
            'estado_id' => 1,
            'fecha_analisis' => now(),
        ]);

        AnalisisDocumento::create([
            'documento_id' => 2,
            'usuario_id' => 2,
            'comentarios' => 'Documento pendiente de revisión.',
            'estado_id' => 2,
            'fecha_analisis' => now(),
        ]);

        AnalisisDocumento::create([
            'documento_id' => 3,
            'usuario_id' => 3,
            'comentarios' => 'Documento rechazado por problemas de formato.',
            'estado_id' => 3,
            'fecha_analisis' => now(),
        ]);
    }
}
