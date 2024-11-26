<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        //Dashboard
        Permission::create([
            'name'=>'Ver dashboard'
        ]);
        //Clientes
        Permission::create([
            'name'=>'Listar clientes'
        ]);
        Permission::create([
            'name'=>'Crear clientes'
        ]);
        Permission::create([
            'name'=>'Editar clientes'
        ]);
        Permission::create([
            'name'=>'Eliminar clientes'
        ]);
        //Productos
        Permission::create([
            'name'=>'Listar productos'
        ]);
        Permission::create([
            'name'=>'Crear productos'
        ]);
        Permission::create([
            'name'=>'Editar productos'
        ]);
        Permission::create([
            'name'=>'Eliminar productos'
        ]);
    }
}
