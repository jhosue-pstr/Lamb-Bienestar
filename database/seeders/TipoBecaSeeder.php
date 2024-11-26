<?php

namespace Database\Seeders;

use App\Models\TipoBeca;
use Illuminate\Database\Seeder;

class TipoBecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoBeca::factory()->count(5)->create();
    }
}
