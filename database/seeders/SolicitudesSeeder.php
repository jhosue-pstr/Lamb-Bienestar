<?php

namespace Database\Seeders;

use App\Models\Solicitudes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Solicitudes::factory(5)->create();
    }
}
