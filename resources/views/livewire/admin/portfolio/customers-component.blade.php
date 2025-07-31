<div>
    <div class="page-header">
        <h3 class="fw-bold mb-3">Clientes</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">Portafolio</li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">Clientes</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row g-3 align-items-center">
                <div class="col-sm-12 col-md-6 dflex justify-content-md-start">
                    <div class="form-group">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Buscar clientes..."
                                wire:model.live="search">
                            <span class="input-icon-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-end">
                    @permission('create-customers')
                        <button class="btn btn-primary btn-round" wire:click="create()">
                            <span class="fas fa-plus me-2"></span> Agregar cliente
                        </button>
                    @endpermission
                    @if ($isOpen)
                        @include('livewire.admin.portfolio.customer-modal')
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
                            <th style="width:5%;">#</th>
                            <th style="width:20%;">NOMBRE</th>
                            <th style="width:20%;">TELÉFONO</th>
                            <th style="width:25%;">WEB</th>
                            <th style="width:15%;">LOGO</th>
                            <th class="text-end" style="width:15%;">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $index => $customer)
                            <tr>
                                <td>{{ $customers->firstItem() + $index }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>
                                    @if ($customer->web)
                                        <a href="{{ $customer->web }}" target="_blank">{{ $customer->web }}</a>
                                    @else
                                        <em class="text-muted">Sin sitio</em>
                                    @endif
                                </td>
                                <td>
                                    @if ($customer->logo)
                                        <img src="{{ asset('storage/' . $customer->logo) }}" alt="{{ $customer->name }}"
                                            width="60">
                                    @else
                                        <em class="text-muted">Sin logo</em>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        @permission('update-customers')
                                            <button class="btn btn-info btn-sm me-1" wire:click="edit({{ $customer->id }})">
                                                <span class="fas fa-edit"></span> Editar
                                            </button>
                                        @endpermission
                                        @permission('delete-customers')
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="confirmDelete({{ $customer->id }})">
                                                <span class="fas fa-trash"></span> Eliminar
                                            </button>
                                        @endpermission
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No se encontraron clientes.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.Livewire.on('confirmDeleteCustomer', id => {
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
                        window.Livewire.dispatch('deleteCustomer', id);
                    }
                });
            });
        });
    </script>
@endpush
