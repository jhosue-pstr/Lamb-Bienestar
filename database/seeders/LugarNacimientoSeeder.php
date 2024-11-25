<?php

namespace Database\Seeders;

use App\Models\LugarNacimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LugarNacimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LugarNacimiento::factory()->count(50)->create();
    }
}
