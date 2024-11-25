<?php

namespace Database\Seeders;

use App\Models\SituacionVivienda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacionViviendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SituacionVivienda::factory()->count(50)->create();
    }
}
