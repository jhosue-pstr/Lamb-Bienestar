<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Asegurarse de que los permisos no se dupliquen
        Permission::firstOrCreate(['name' => 'Ver dashboard', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'Editar usuario', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'Eliminar usuario', 'guard_name' => 'web']);

    }
}

