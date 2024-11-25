<?php

namespace Database\Seeders;

use App\Models\SituacionSalud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacionSaludSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SituacionSalud::factory()->count(50)->create();
    }
}
