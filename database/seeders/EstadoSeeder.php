<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::create([
            'nombre' => 'Pendiente',
            'descripcion' => 'El documento está pendiente de revisión',
        ]);

        Estado::create([
            'nombre' => 'Aprobado',
            'descripcion' => 'El documento ha sido aprobado',
        ]);

        Estado::create([
            'nombre' => 'Rechazado',
            'descripcion' => 'El documento ha sido rechazado',
        ]);

        Estado::create([
            'nombre' => 'Activo',
            'descripcion' => 'Elemento activo en el sistema',
        ]);

        Estado::create([
            'nombre' => 'Inactivo',
            'descripcion' => 'Elemento inactivo en el sistema',
        ]);
    }
}
