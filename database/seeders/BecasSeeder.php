<?php

namespace Database\Seeders;

use App\Models\Becas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BecasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Becas::factory(5)->create();
    }
}
