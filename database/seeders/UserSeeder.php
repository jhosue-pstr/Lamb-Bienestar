<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'name'=>'Ronald Jhosue Pastor Quispe',
            'email'=>'ronald1pasot@gmai;com',
            'password'=>bcrypt('12345678')
        ]);
        $user=User::create([
            'name'=>'Reginaldo Dan Mayhuire   ',
            'email'=>'reginaldomayhuire@upeu.edu.pe',
            'password'=>bcrypt('12345678')
        ]);
        $user->assignRole('Administrador');
        User::factory(10)->create();

        $user->assignRole('Coordinador');
        User::factory(10)->create();

        $user->assignRole('Trabajador Social');
        User::factory(10)->create();

        $user->assignRole('Estudiante');
        User::factory(10)->create();

    }
}
