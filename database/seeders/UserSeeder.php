<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Frans',
            'email' => 'frans@gmail.com',
            'password' => bcrypt('SistemaMar')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Roger',
            'email' => 'J09451k@upla.edu.pe',
            'password' => bcrypt('chupaquino')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Jessica',
            'email' => 'jessica-991@outlook.es',
            'password' => bcrypt('administradora')
        ])->assignRole('Administrador');
    }
}
