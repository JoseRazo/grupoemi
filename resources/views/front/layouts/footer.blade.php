<footer class="ftco-footer">
    <div class="container mb-5 pb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2 d-flex align-items-center">Acerca de</h2>
                    <p>Grupo EMI es una empresa joven, innovadora y comprometida con brindar un servicio de calidad en
                        la industria de la construcción.</p>
                    <ul class="ftco-footer-social list-unstyled mt-4">
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">Enlaces</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-md-4">
                            <li><a href="{{ route('about') }}"><span class="fa fa-chevron-right mr-2"></span>¿Quiénes somos?</a></li>
                            <li><a href="{{ route('projects') }}"><span class="fa fa-chevron-right mr-2"></span>Proyectos</a></li>
                            <li><a href="{{ route('services') }}"><span class="fa fa-chevron-right mr-2"></span>Servicios</a></li>
                            <li><a href="{{ route('contact') }}"><span class="fa fa-chevron-right mr-2"></span>Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">¿Tienes alguna pregunta?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="fa fa-map-marker mr-3"></span><span class="text">Salamanca, Gto, México.</span></li>
                            <li><a href="tel:4641010877"><span class="fa fa-phone mr-3"></span><span class="text">464 101 0877</span></a></li>
                            <li><a href="https://wa.me/524621010582" target="_blank"><span class="fa fa-whatsapp mr-3"></span><span class="text">462 101 0582</span></a></li>
                            <li><a href="mailto:contacto@industrialgremi.com"><span class="fa fa-paper-plane mr-3"></span><span
                                        class="text">contacto@industrialgremi.com</span></a></li>
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
                        </script> Todos los derechos reservados <a href="{{ route('home') }}">Grupo
                            EMI.</a> Desarrollado por <a href="https://joserazo.github.io/cv/" target="_blank">José
                            Razo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
