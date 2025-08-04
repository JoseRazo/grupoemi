<footer class="ftco-footer">
    <div class="container mb-5 pb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2 d-flex align-items-center">Acerca de</h2>
                    <p>{{ $siteSettings->about_us }}</p>
                    <ul class="ftco-footer-social list-unstyled mt-4">
                        <li><a href="{{ whatsapp_href($siteSettings->whatsapp) }}" target="_blank"><span class="fa fa-whatsapp"></span></a></li>
                        <li><a href="{{ $siteSettings->facebook }}" target="_blank"><span class="fa fa-facebook"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">Enlaces</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-md-4">
                            <li><a href="{{ route('about') }}"><span class="fa fa-chevron-right mr-2"></span>¿Quiénes
                                    somos?</a></li>
                            <li><a href="{{ route('projects') }}"><span
                                        class="fa fa-chevron-right mr-2"></span>Proyectos</a></li>
                            <li><a href="{{ route('services') }}"><span
                                        class="fa fa-chevron-right mr-2"></span>Servicios</a></li>
                            <li><a href="{{ route('contact') }}"><span
                                        class="fa fa-chevron-right mr-2"></span>Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">¿Tienes alguna pregunta?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="fa fa-map-marker mr-3"></span><span
                                    class="text">{{ $siteSettings->address }}</span></li>
                            <li><a href="{{ phone_href($siteSettings->phone) }}"><span class="fa fa-phone mr-3"></span><span
                                        class="text">{{ format_phone($siteSettings->phone) }}</span></a></li>
                            <li><a href="{{ whatsapp_href($siteSettings->whatsapp) }}" target="_blank"><span
                                        class="fa fa-whatsapp mr-3"></span><span
                                        class="text">{{ format_phone($siteSettings->whatsapp) }}</span></a></li>
                            <li><a href="mailto:{{ $siteSettings->email }}"><span
                                        class="fa fa-paper-plane mr-3"></span><span
                                        class="text">{{ $siteSettings->email }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 aside-stretch py-3">

                    <p class="mb-0">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Todos los derechos reservados <a href="{{ route('home') }}">{{ $siteSettings->company_name }}.</a> Desarrollado por <a href="https://joserazo.github.io/cv/" target="_blank">José
                            Razo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
