<?php

namespace Database\Seeders;

use App\Models\Historial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Historial::factory()->count(10)->create();
    }
}
