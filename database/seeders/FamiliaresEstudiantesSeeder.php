<?php

namespace Database\Seeders;

use App\Models\FamiliaresEstudiantes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamiliaresEstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FamiliaresEstudiantes::factory(10)->create();
    }
}
