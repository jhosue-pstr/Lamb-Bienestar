<?php

namespace Database\Seeders;

use App\Models\Beca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beca::factory()->count(1)->create();
    }
}
