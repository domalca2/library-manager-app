<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crear los roles
        $adminRole = Role::create(['name' => 'administrador']);
        $userRole = Role::create(['name' => 'usuario']);
        //asignar permisos
        $adminRole->givePermissionTo('borrar libros');
    }
}
