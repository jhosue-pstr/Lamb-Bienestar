<?php

namespace Database\Seeders;

use App\Models\CitaCalificacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitaCalificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CitaCalificacion::factory()->count(10)->create();
    }
}
