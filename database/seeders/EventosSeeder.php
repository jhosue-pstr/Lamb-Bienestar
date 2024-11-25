<?php

namespace Database\Seeders;

use App\Models\Eventos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eventos::factory()->count(50)->create();

    }
}
