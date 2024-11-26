<?php

namespace Database\Seeders;

use App\Models\TipoRequisito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoRequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoRequisito::factory()->count(5)->create();
    }
}
