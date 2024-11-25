<?php

namespace Database\Seeders;

use App\Models\VerificacionRequisito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerificacionRequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VerificacionRequisito::factory()->count(10)->create();
    }
}
