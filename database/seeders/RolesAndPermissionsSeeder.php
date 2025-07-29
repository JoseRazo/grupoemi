<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $modules = ['users', 'roles', 'permissions'];
        $actions = ['create', 'read', 'update', 'delete'];

        foreach ($modules as $module) {
            foreach ($actions as $action) {
                Permission::firstOrCreate([
                    'name' => "{$action}-{$module}",
                    'display_name' => ucfirst($action) . " " . ucfirst($module),
                    'description' => "Permiso para {$action} {$module}"
                ]);
            }
        }

        // Crear roles y asignar permisos
        $roles = [
            ['name' => 'super-admin', 'display_name' => 'Super Administrador', 'description' => 'Acceso total al sistema'],
            ['name' => 'admin', 'display_name' => 'Administrador', 'description' => 'Gestión de usuarios y configuración'],
            ['name' => 'employee', 'display_name' => 'Empleado', 'description' => 'Acceso limitado a funciones específicas'],
        ];

        foreach ($roles as $roleData) {
            $role = Role::firstOrCreate(['name' => $roleData['name']], $roleData);

            // Si el rol es super-admin, asignarle todos los permisos
            if ($role->name === 'super-admin') {
                $allPermissions = Permission::pluck('name')->toArray();
                $role->syncPermissions($allPermissions);
            }
        }
    }
}
