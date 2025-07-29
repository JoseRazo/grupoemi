<div>
    <div class="page-header">
        <h3 class="fw-bold mb-3">Roles</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                Autenticación
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.system.auth.roles.index') }}">Roles</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row g-3 align-items-center">
                <div class="col-sm-12 col-md-6 dflex justify-content-md-start">
                    <div class="form-group">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Buscar roles..."
                                wire:model.live="search">
                            <span class="input-icon-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-end">
                    @permission('create-roles')
                        <button class="btn btn-primary btn-round" wire:click="create()">
                            <span class="fas fa-plus me-2"></span> Agregar rol
                        </button>
                    @endpermission
                    @if ($isOpen)
                        @include('livewire.admin.system.auth.roles.role-modal')
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="my-2">
                @include('back.auth.layouts.messages')
            </div>
            <div class="table-responsive">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th class="sort align-middle pe-5" scope="col" style="width:5%;">#</th>
                            <th class="sort align-middle pe-5" scope="col" style="width:40%;">NOMBRE</th>
                            <th class="sort align-middle pe-5" scope="col" style="width:40%;">DESCRIPCIÓN</th>
                            <th class="sort align-middle text-end pe-5" scope="col" style="width:15%;">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $index => $role)
                            <tr>
                                <td>
                                    <p class="mb-0 text-body-emphasis fw-bold">
                                        {{ $roles->firstItem() + $index }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 text-body-emphasis fw-bold">
                                        {{ $role->name }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 text-body-emphasis">{{ $role->description }}</p>
                                </td>
                                <td class="d-flex align-items-center">
                                    @permission('update-roles')
                                        <button class="btn btn-info btn-sm me-1" wire:click="edit({{ $role->id }})">
                                            <span class="fas fa-edit"></span> Editar
                                        </button>
                                    @endpermission
                                    @permission('delete-roles')
                                        <button class="btn btn-danger btn-sm"
                                            wire:click="confirmDelete({{ $role->id }})">
                                            <span class="fas fa-trash"></span> Eliminar
                                        </button>
                                    @endpermission
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No se encontraron
                                    roles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $roles->links() }}
            </div>
            <div class="mt-3 mb-3 d-flex justify-content-center">
                <a class="fw-semibold" href="{{ route('admin.system.auth.roles.index') }}" data-list-view="*">Ver
                    todo
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.Livewire.on('confirmDeleteRole', roleId => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Esta acción no se puede revertir.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.dispatch('deleteRole', roleId); // Enviamos solo el ID
                    }
                });
            });

            // Initialize Multi.js para select permissions
            Livewire.on('openModal', function() {
                // Retraso de 300 ms para asegurar que el modal y los elementos estén disponibles
                setTimeout(function() {
                    var select = document.getElementById('permissions');
                    if (select) {
                        // Inicializa Multi.js
                        multi(select, {
                            search_placeholder: 'Buscar permisos...',
                        });
                    } else {
                        console.warn("Elemento select con id 'permissions' no encontrado.");
                    }
                }, 300);
            });
        });
    </script>
@endpush
