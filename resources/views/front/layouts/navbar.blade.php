<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->routeIS('home') ? 'active' : '' }}"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item {{ request()->routeIS('about') ? 'active' : '' }}"><a href="{{ route('about') }}" class="nav-link">¿Quiénes somos?</a></li>
                <li class="nav-item {{ request()->routeIS('services') ? 'active' : '' }}"><a href="{{ route('services') }}" class="nav-link">Servicios</a></li>
                <li class="nav-item {{ request()->routeIs('projects', 'projects.by.category') ? 'active' : '' }}"><a href="{{ route('projects') }}" class="nav-link">Trabajos Realizados</a></li>
            </ul>
            <a href="{{ route('contact') }}" class="btn-custom" style="{{ request()->routeIS('contact') ? 'background: #fc5e28;' : '' }}">Contáctanos</a>
        </div>
    </div>
</nav>
<!-- END nav -->
