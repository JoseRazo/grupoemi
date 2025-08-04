@php
    $isAuthRoute = request()->routeIs('admin.system.auth.*');
@endphp
<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('storage/' . $siteSettings->logo_url) }}" alt="navbar brand" class="navbar-brand"
                    width="30" />
                <span class="text text-white fw-bolder ms-2">{{ $siteSettings->company_name }}</span>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li
                    class="nav-item if(request()->routeIs('admin.dashboard')) {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- Portfolio --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Portafolio</h4>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.portfolio.services.*') ? 'active submenu' : '' }}">
                    <a href="{{ route('admin.portfolio.services.index') }}">
                        <i class="fas fa-industry"></i>
                        <p>Servicios</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('admin.portfolio.service-categories.*') ? 'active submenu' : '' }}">
                    <a href="{{ route('admin.portfolio.service-categories.index') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Categorias</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('admin.portfolio.service-photos.*') ? 'active submenu' : '' }}">
                    <a href="{{ route('admin.portfolio.service-photos.index') }}">
                        <i class="fas fa-images"></i>
                        <p>Fotos</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.portfolio.customers.*') ? 'active submenu' : '' }}">
                    <a href="{{ route('admin.portfolio.customers.index') }}">
                        <i class="fas fa-building"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                {{-- End Portfolio --}}
                {{-- System --}}
                @role('super-admin|admin')
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Sistema</h4>
                    </li>
                    <li class="nav-item {{ $isAuthRoute ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#auth">
                            <i class="fas fa-lock"></i>
                            <p>Autenticación</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ $isAuthRoute ? 'show' : '' }}" id="auth">
                            <ul class="nav nav-collapse">
                                @permission('read-users')
                                    <li class="{{ request()->routeIs('admin.system.auth.users.index') ? 'active' : '' }}">
                                        <a href="{{ route('admin.system.auth.users.index') }}">
                                            <span class="sub-item">Usuarios</span>
                                        </a>
                                    </li>
                                @endpermission
                                @permission('read-roles')
                                    <li class="{{ request()->routeIs('admin.system.auth.roles.index') ? 'active' : '' }}">
                                        <a href="{{ route('admin.system.auth.roles.index') }}">
                                            <span class="sub-item">Roles</span>
                                        </a>
                                    </li>
                                @endpermission
                                @permission('read-permissions')
                                    <li
                                        class="{{ request()->routeIs('admin.system.auth.permissions.index') ? 'active' : '' }}">
                                        <a href="{{ route('admin.system.auth.permissions.index') }}">
                                            <span class="sub-item">Permisos</span>
                                        </a>
                                    </li>
                                @endpermission
                            </ul>
                        </div>
                    </li>
                    {{-- Setings --}}
                    <li class="nav-item {{ request()->routeIs('admin.system.settings.index') ? 'active submenu' : '' }}">
                        <a href="{{ route('admin.system.settings.index') }}">
                            <i class="fas fa-wrench"></i>
                            <p>Ajustes Generales</p>
                        </a>
                    </li>
                @endrole
                {{-- End System --}}
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
