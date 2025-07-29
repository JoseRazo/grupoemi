<?php

namespace App\Livewire\Admin\System\Auth\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;
use App\Models\Permission;

class RolesComponent extends Component
{
    use WithPagination;

    public $name, $display_name, $description, $role_id;
    public $selectedPermissions = [];
    public $isOpen = false; // Para manejar la visibilidad del modal
    public $search = ''; // Variable para la búsqueda
    protected $paginationTheme = 'bootstrap'; // Establecer el tema de paginación
    protected $listeners = ['deleteRole' => 'delete']; // Escuchar evento para eliminar

    public function updatingSearch()
    {
        $this->resetPage(); // Resetear la paginación al buscar
    }

    public function render()
    {
        $roles = Role::where(function ($query) {
            $query->where('name', 'like', "%{$this->search}%")
                  ->orWhere('display_name', 'like', "%{$this->search}%");
        })->orderBy('name')->paginate(10);

        $permissions = Permission::orderBy('name')->get();

        return view('livewire.admin.system.auth.roles.roles-component', compact('roles', 'permissions'))
            ->extends('back.layouts.base')
            ->section('content');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
        $this->dispatch('openModal'); // Emite el evento para inicializar Multi.js
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetValidation();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->display_name = '';
        $this->description = '';
        $this->role_id = '';
        $this->selectedPermissions = [];
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:3|unique:roles,name,' . $this->role_id,
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Verificar si estamos editando un rol existente
        if ($this->role_id) {
            $role = Role::find($this->role_id);
            if ($role) {
                $currentPermissions = $role->permissions->pluck('id')->toArray();
                $selectedPermissions = $this->selectedPermissions ?: [];

                // Verificar si hay cambios
                if (
                    $role->name === $this->name &&
                    $role->display_name === $this->display_name &&
                    $role->description === $this->description &&
                    empty(array_diff($selectedPermissions, $currentPermissions)) &&
                    empty(array_diff($currentPermissions, $selectedPermissions))
                ) {
                    // No hubo cambios, cerramos el modal y salimos
                    $this->closeModal();
                    return;
                }
            }
        }

        // Crear o actualizar el rol y obtener la instancia actualizada
        $role = Role::updateOrCreate(
            ['id' => $this->role_id],
            [
                'name' => $this->name,
                'display_name' => $this->display_name,
                'description' => $this->description,
            ]
        );

        // Asignar permisos al rol después de la creación/actualización
        $role->syncPermissions($this->selectedPermissions ?? []);

        session()->flash('message', 
            $this->role_id ? 'Rol actualizado correctamente.' : 'Rol creado correctamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->role_id = $id;
        $this->name = $role->name;
        $this->display_name = $role->display_name;
        $this->description = $role->description;

        // Cargar permisos actuales del rol
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();

        $this->openModal();
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDeleteRole', $id);
    }    

    public function delete($RoleId)
    {
        $role = Role::find($RoleId);

        if ($role) {
            $role->permissions()->detach();
            $role->delete();
            session()->flash('message', 'Rol eliminado correctamente.');
        } else {
            session()->flash('error', 'No se encontró el rol.');
        }
    }
}
