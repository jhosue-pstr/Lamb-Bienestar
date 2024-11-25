<?php

namespace Database\Seeders;

use App\Models\FichaSocioEconomica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FichaSocioEconomicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *  @return void
     */
    public function run()
    {
        // Crear 10 registros de FichaSocioEconomica utilizando las fábricas
        FichaSocioEconomica::factory()->count(10)->create();
    }
}
