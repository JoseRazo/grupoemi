@extends('front.layouts.base')

@section('title', 'Contacto')

@section('content')
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url({{ asset('assets/images/bg_2.jpg') }}); background-position: 50% 39.5px; height: 350px;"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 350px;">
                <div class="col-md-9 ftco-animate pb-5 fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Contacto <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-3 bread">Contáctanos</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <span class="subheading">Contáctanos</span>
                    <h2 class="mb-4">Envíanos un mensaje para más información</h2>
                    <p>Estamos aquí para ayudarte. Contáctanos y con gusto resolveremos tus dudas o inquietudes.</p>
                </div>
            </div>

            <div class="row block-9">
                <div class="col-md-8">
                    <form action="{{ route('contact.submit') }}" method="POST" id="contactForm" class="p-4 p-md-5 contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico">
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Número de teléfono">
                                </div>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Asunto">
                                </div>
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Mensaje"></textarea>
                                </div>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Enviar mensaje" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4 d-flex pl-md-5">
                    <div class="row">
                        <div class="dbox w-100 d-flex ftco-animate fadeInUp ftco-animated">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="text">
                                <p><span>Dirección:</span> {{ $siteSettings->address }}</p>
                            </div>
                        </div>
                        <div class="dbox w-100 d-flex ftco-animate fadeInUp ftco-animated">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="text">
                                <p><span>Teléfono:</span> <a href="{{ phone_href($siteSettings->phone) }}">{{ format_phone($siteSettings->phone) }}</a></p>
                            </div>
                        </div>
                        <div class="dbox w-100 d-flex ftco-animate fadeInUp ftco-animated">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-whatsapp"></span>
                            </div>
                            <div class="text">
                                <p><span>WhatsApp:</span> <a href="{{ whatsapp_href($siteSettings->whatsapp) }}" target="_blank">{{ format_phone($siteSettings->whatsapp) }}</a></p>
                            </div>
                        </div>
                        <div class="dbox w-100 d-flex ftco-animate fadeInUp ftco-animated">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <div class="text">
                                <p><span>Correo:</span> <a href="mailto:{{ $siteSettings->email }}">{{ $siteSettings->email }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    @if (session('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('message') }}',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#06A3DA'
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#06A3DA'
                });
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: '¡Error en el formulario!',
                    html: `
                    <ul style="text-align: left; color: #D32F2F;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#06A3DA'
                });
            });
        </script>
    @endif
@endpush
