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
            'dni' => '48547813',
            'email' => 'frans@gmail.com',
            'password' => bcrypt('SistemaMar')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Roger',
            'dni' => '73419770',
            'email' => 'J09451k@upla.edu.pe',
            'password' => bcrypt('chupaquino')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Jessica',
            'dni' => '12345678',
            'email' => 'jessica-991@outlook.es',
            'password' => bcrypt('administradora')
        ])->assignRole('Administrador');
    }
}
