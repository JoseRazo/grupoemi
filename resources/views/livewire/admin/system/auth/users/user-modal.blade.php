<div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" style="background: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $user_id ? 'Editar Usuario' : 'Crear Usuario' }}</h5>
                <button type="button" class="btn-close" wire:click="closeModal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" wire:model="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" wire:model="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    @permission('read-roles')
                    <div class="mb-3">
                        <label for="roles" class="form-label">Roles</label>
                        <select wire:model="selectedRoles" id="roles" class="form-control" multiple="multiple" style="width: 100%;">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endpermission
                    @permission('read-permissions')
                    <div class="mb-3">
                        <label for="permissions" class="form-label">Permisos</label>
                        <select wire:model="selectedPermissions" id="permissions" class="form-control" multiple="multiple" style="width: 100%;">
                            @foreach($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endpermission
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                <button type="button" class="btn btn-primary" wire:click="store">
                    {{ $user_id ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </div>
    </div>
</div>