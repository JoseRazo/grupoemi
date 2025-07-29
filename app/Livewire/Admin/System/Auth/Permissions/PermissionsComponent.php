<?php

namespace App\Livewire\Admin\System\Auth\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Permission;

class PermissionsComponent extends Component
{
    use WithPagination;

    public $name, $display_name, $description, $permission_id;
    public $isOpen = false; // Para manejar la visibilidad del modal
    public $search = ''; // Variable para la búsqueda
    protected $paginationTheme = 'bootstrap'; // Establecer el tema de paginación
    protected $listeners = ['deletePermission' => 'delete']; // Escuchar evento para eliminar

    public function updatingSearch()
    {
        $this->resetPage(); // Resetear la paginación al buscar
    }

    public function render()
    {
        $permissions = Permission::where(function ($query) {
            $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('display_name', 'like', "%{$this->search}%");
        })->orderBy('name')->paginate(10);

        return view('livewire.admin.system.auth.permissions.permissions-component', compact('permissions'))
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
        $this->permission_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:3|unique:permissions,name,' . $this->permission_id,
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Buscar permiso si es edición
        $permission = Permission::find($this->permission_id);

        // Si el rol existe, verificar si hubo cambios
        if ($permission) {
            if (
                $permission->name === $this->name &&
                $permission->display_name === $this->display_name &&
                $permission->description === $this->description
            ) {
                // No hubo cambios, no actualizar ni mostrar mensaje
                $this->closeModal();
                return;
            }
        }

        Permission::updateOrCreate(['id' => $this->permission_id], [
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
        ]);

        session()->flash('message', 
            $this->permission_id ? 'Permiso actualizado correctamente.' : 'Permiso creado correctamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $this->permission_id = $id;
        $this->name = $permission->name;
        $this->display_name = $permission->display_name;
        $this->description = $permission->description;

        $this->openModal();
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDeletePermission', $id);
    }    

    public function delete($PermissionId)
    {
        $permission = Permission::find($PermissionId);

        if ($permission) {
            $permission->delete();
            session()->flash('message', 'Permiso eliminado correctamente.');
        } else {
            session()->flash('error', 'No se encontró el permiso.');
        }
    }
}
