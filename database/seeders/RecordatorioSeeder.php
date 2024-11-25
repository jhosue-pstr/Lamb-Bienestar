<?php

namespace Database\Seeders;

use App\Models\Recordatorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordatorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recordatorio::factory()->count(50)->create();
    }
}
