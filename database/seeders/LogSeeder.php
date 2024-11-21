<?php

namespace Database\Seeders;

use App\Models\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::create([
            'usuario_id' => 1, // Suponiendo que el usuario con ID 1 existe
            'nivel' => 'info',
            'mensaje' => 'El sistema se inició correctamente.',
            'datos' => json_encode(['ip' => '192.168.1.1', 'browser' => 'Chrome']),
        ]);

        Log::create([
            'usuario_id' => 2, // Suponiendo que el usuario con ID 2 existe
            'nivel' => 'error',
            'mensaje' => 'Se produjo un error al guardar el documento.',
            'datos' => json_encode(['error_code' => '1234', 'file' => 'documento1.pdf']),
        ]);
    }
}
