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
        Role::firstOrCreate(['name' => 'Coordinador', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Trabajador Social', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Estudiante', 'guard_name' => 'web']);

        // Crear el usuario 'Administrador' y asignarle el rol
        $user = User::firstOrCreate([
            'email' => 'ronald1pasot@gmai.com',
        ], [
            'name' => 'Ronald Jhosue Pastor Quispe',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole('Administrador'); // Asignar el rol 'Administrador'

        // Crear 10 usuarios con el rol 'Coordinador'
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('Coordinador');
        });

        // Crear 10 usuarios con el rol 'Trabajador Social'
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('Trabajador Social');
        });

        // Crear 10 usuarios con el rol 'Estudiante'
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('Estudiante');
        });
    }
}
