<div>
    <div class="page-header">
        <h3 class="fw-bold mb-3">Configuración del sitio</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a>
            </li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item">Sistema</li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item">Configuración</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-body">
            <div id="success-message">
                @include('back.auth.layouts.messages')
            </div>

            {{-- Información general --}}
            <h4 class="card-title mb-2">Información general</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nombre de la empresa</label>
                    <input type="text" class="form-control" wire:model="company_name">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Logo</label>
                    <div class="d-flex align-items-center gap-3">
                        <input type="file" class="form-control" wire:model="logo_file" style="max-width: 70%;">

                        @if ($logo_url)
                            <div>
                                <a href="{{ Storage::url($logo_url) }}" target="_blank">
                                    <img src="{{ Storage::url($logo_url) }}" alt="Logo"
                                        class="img-fluid rounded border" style="max-height: 40px;">
                                </a>
                            </div>
                        @endif
                    </div>

                    @error('logo_file')
                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label>Sobre nosotros</label>
                    <textarea class="form-control" rows="3" wire:model="about_us"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Imagen Sobre Nosotros</label>
                    <div class="d-flex align-items-center gap-3">
                        <input type="file" class="form-control" wire:model="about_us_image_file"
                            style="max-width: 70%;">

                        @if ($about_us_image)
                            <div>
                                <a href="{{ Storage::url($about_us_image) }}" target="_blank">
                                    <img src="{{ Storage::url($about_us_image) }}" alt="Sobre nosotros"
                                        class="img-fluid rounded border" style="max-height: 40px;">
                                </a>
                            </div>
                        @endif
                    </div>

                    @error('about_us_image_file')
                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label>Misión</label>
                    <textarea class="form-control" rows="3" wire:model="mission"></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label>Visión</label>
                    <textarea class="form-control" rows="3" wire:model="vision"></textarea>
                </div>
            </div>

            <hr class="my-4">

            {{-- Contacto --}}
            <h4 class="card-title mb-2">Contacto</h4>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Correo electrónico</label>
                    <input type="email" class="form-control" wire:model="email">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Teléfono</label>
                    <input type="text" class="form-control" wire:model="phone">
                </div>
                <div class="col-md-4 mb-3">
                    <label>WhatsApp</label>
                    <input type="text" class="form-control" wire:model="whatsapp">
                </div>
                <div class="col-12 mb-3">
                    <label>Dirección</label>
                    <input type="text" class="form-control" wire:model="address">
                </div>
                <div class="col-12 mb-3">
                    <label>Google Maps Link</label>
                    <input type="url" class="form-control" wire:model="google_maps_link">
                </div>
            </div>

            <hr class="my-4">

            {{-- Redes sociales --}}
            <h4 class="card-title mb-2">Redes sociales</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Facebook</label>
                    <input type="text" class="form-control" wire:model="facebook">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Instagram</label>
                    <input type="text" class="form-control" wire:model="instagram">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Twitter</label>
                    <input type="text" class="form-control" wire:model="twitter">
                </div>
                <div class="col-md-6 mb-3">
                    <label>LinkedIn</label>
                    <input type="text" class="form-control" wire:model="linkedin">
                </div>
                <div class="col-md-6 mb-3">
                    <label>YouTube</label>
                    <input type="text" class="form-control" wire:model="youtube">
                </div>
                <div class="col-md-6 mb-3">
                    <label>TikTok</label>
                    <input type="text" class="form-control" wire:model="tiktok">
                </div>
            </div>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancelar</a>
            <button type="button" class="btn btn-primary" wire:click="store">Guardar cambios</button>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('scroll-to-message', () => {
            const el = document.getElementById('success-message');
            if (el) {
                el.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    </script>
@endpush
