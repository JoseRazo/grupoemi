<section class="ftco-section" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="about-wrap img w-100" style="background-image: url({{ asset('storage/' . $siteSettings->about_us_image) }});">
                    <div class="icon d-flex align-items-center justify-content-center"><span
                            class="flaticon-crane"></span></div>
                </div>
            </div>
            <div class="col-md-6 py-5 pl-md-5">
                <div class="row justify-content-center mb-4 pt-md-4">
                    <div class="col-md-12 heading-section ftco-animate fadeInUp ftco-animated">
                        <span class="subheading">Bienvenido a {{ $siteSettings->company_name }}</span>
                        <h2 class="mb-4">Grupo Electromecánico Industrial</h2>
                        <div class="d-flex about">
                            <div class="icon"><span class="flaticon-architect"></span></div>
                            <h3>{{ $siteSettings->about_us }}</h3>
                        </div>
                        <!-- Mission and Vision Titles -->
                        <h3>NUESTRA MISIÓN</h3>
                        <p>{{ $siteSettings->mission }}</p>
                        
                        <h3>NUESTRA VISIÓN</h3>
                        <p>{{ $siteSettings->vision }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
