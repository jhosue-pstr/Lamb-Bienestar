<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        Role::firstOrCreate(['name' => 'Administrador', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Coordinador BU', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'BU', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Estudiante', 'guard_name' => 'web']);
    }

}
