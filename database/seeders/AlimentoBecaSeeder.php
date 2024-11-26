<?php

namespace Database\Seeders;

use App\Models\AlimentoBeca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlimentoBecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AlimentoBeca::factory()->count(50)->create();
    }
}
