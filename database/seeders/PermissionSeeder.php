<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'dashboard', 'description' => 'Ver panel'])->syncRoles('Administrador', 'Asistente');

        Permission::create(['name' => 'users.index', 'description' => 'Ver lista de usuarios'])->syncRoles('Administrador', 'Asistente');
        Permission::create(['name' => 'users.create', 'description' => 'Crear usuario'])->syncRoles('Administrador');
        Permission::create(['name' => 'users.edit', 'description' => 'Editar usuario'])->syncRoles('Administrador');
        Permission::create(['name' => 'users.show', 'description' => 'Ver detalles de usuario'])->syncRoles('Administrador', 'Asistente');
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuario'])->syncRoles('Administrador');
    }
}
