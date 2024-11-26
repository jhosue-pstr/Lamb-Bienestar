<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles si no existen
        Role::firstOrCreate(['name' => 'Administrador', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Coordinador BU', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'BU', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Estudiante', 'guard_name' => 'web']);

        // Crear un usuario para el rol 'Administrador'
        $admin = User::firstOrCreate([
            'email' => 'ronald1pasot@gmai.com',
        ], [
            'name' => 'Ronald Jhosue Pastor Quispe',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('Administrador');
        $coordinador = User::firstOrCreate([
            'email' => 'coordinador@ejemplo.com',
        ], [
            'name' => 'Coordinador BU',
            'password' => bcrypt('12345678'),
        ]);
        $coordinador->assignRole('Coordinador BU');
        // Crear un usuario para el rol 'BU'
        $bu = User::firstOrCreate([
            'email' => 'bu@ejemplo.com',
        ], [
            'name' => 'BU Usuario',
            'password' => bcrypt('12345678'),
        ]);
        $bu->assignRole('BU');

        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('Estudiante');
        });
    }
}
