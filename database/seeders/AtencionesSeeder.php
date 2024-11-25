<?php

namespace Database\Seeders;

use App\Models\Atenciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtencionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Atenciones::factory()->count(50)->create();
    }
}
