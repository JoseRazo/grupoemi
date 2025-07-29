<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserWithSuperAdminRoleSeeder extends Seeder
{
    public function run()
    {
        // Crear el usuario
        $user = User::firstOrCreate(
            ['email' => 'super-admin@app.com'], // Correo único para el usuario
            [
                'name' => 'Super Admin',
                'email' => 'super-admin@app.com',
                'password' => Hash::make('password'), // Puedes cambiar la contraseña
            ]
        );

        // Obtener el rol super-admin
        $superAdminRole = Role::firstOrCreate(
            ['name' => 'super-admin'],
            [
                'display_name' => 'Super Administrador',
                'description' => 'Acceso total al sistema',
            ]
        );

        // Asignar el rol de super-admin al usuario
        $user->syncRoles([$superAdminRole->name]);
    }
}
