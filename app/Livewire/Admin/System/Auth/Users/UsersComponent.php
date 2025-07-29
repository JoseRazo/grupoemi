<?php

namespace App\Livewire\Admin\System\Auth\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;

class UsersComponent extends Component
{
    use WithPagination;

    public $user_id, $name, $email, $password;
    public $selectedRoles = [];
    public $selectedPermissions = [];
    public $isOpen = false; // Para manejar la visibilidad del modal
    public $search = ''; // Variable para la búsqueda
    protected $paginationTheme = 'bootstrap'; // Establecer el tema de paginación
    protected $listeners = ['deleteUser' => 'delete']; // Escuchar evento para eliminar

    public function updatingSearch()
    {
        $this->resetPage(); // Resetear la paginación al buscar
    }

    public function render()
    {
        $users = User::where(function ($query) {
            $query->where('name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%");
        });

        if (!auth()->user()->hasRole('super-admin')) {
            $users->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'super-admin');
            });
        }

        $users = $users->orderBy('name')->paginate(10);

        $permissions = Permission::orderBy('name')->get();
        $roles = Role::orderBy('name')->get();

        return view('livewire.admin.system.auth.users.users-component', compact('users', 'permissions', 'roles'))
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
        $this->user_id = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->selectedRoles = [];
        $this->selectedPermissions = [];
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'password' => $this->user_id ? 'nullable|min:6' : 'required|min:6',
        ]);

        // Buscar usuario si es edición
        $user = User::find($this->user_id);

        // Si el usuario existe, verificar si hubo cambios
        if ($user) {
            $currentRoles = $user->roles->pluck('id')->toArray();
            $selectedRoles = $this->selectedRoles ?: [];
            $currentPermissions = $user->permissions->pluck('id')->toArray();
            $selectedPermissions = $this->selectedPermissions ?: [];
        
            if (
                $user->name === $this->name &&
                $user->email === $this->email &&
                (!$this->password || Hash::check($this->password, $user->password)) &&
                empty(array_diff($selectedRoles, $currentRoles)) &&
                empty(array_diff($currentRoles, $selectedRoles)) &&
                empty(array_diff($selectedPermissions, $currentPermissions)) &&
                empty(array_diff($currentPermissions, $selectedPermissions))
            ) {
                // No hubo cambios, cerramos el modal y salimos
                $this->closeModal();
                return;
            }
        }

        // Crear o actualizar usuario
        $user = User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? Hash::make($this->password) : ($user ? $user->password : null),
        ]);

        // Asignar roles y permisos al usuario
        if ($user) {
            $user->syncRoles($this->selectedRoles ?? []);
            $user->syncPermissions($this->selectedPermissions ?? []);
        }

        session()->flash('message', 
            $this->user_id ? 'Usuario actualizado correctamente.' : 'Usuario creado correctamente.');

        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = ''; // No mostramos la contraseña

        // Cargar roles actuales del usuario
        $this->selectedRoles = $user->roles->pluck('id')->toArray();

        // Cargar permisos actuales del usuario
        $this->selectedPermissions = $user->permissions->pluck('id')->toArray();

        $this->openModal();
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDeleteUser', $id);
    }    

    public function delete($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->roles()->detach();
            $user->permissions()->detach();
            $user->delete();
            session()->flash('message', 'Usuario eliminado correctamente.');
        } else {
            session()->flash('error', 'No se encontró el usuario.');
        }
    }

}
