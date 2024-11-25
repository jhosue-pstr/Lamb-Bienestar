<?php

namespace Database\Seeders;

use App\Models\EconomiaFamiliar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EconomiaFamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EconomiaFamiliar::factory()->count(10)->create();
    }
}
