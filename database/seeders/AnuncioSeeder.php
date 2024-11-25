<?php

namespace Database\Seeders;

use App\Models\Anuncio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Anuncio::factory()->count(50)->create();
    }
}
