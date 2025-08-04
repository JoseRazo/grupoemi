<div class="py-1 top">
    <div class="container">
        <div class="row">
            <div
                class="col-sm-12 col-md-6 text-center text-md-left mb-md-0 mb-2 pr-md-4 d-flex topper align-items-center">
                <p class="mb-0 w-100">
                    <span class="fa fa-paper-plane"></span>
                    <span class="text">{{ $siteSettings->email }}</span>
                </p>
            </div>
            <div
                class="col-sm-12 text-center text-md-left mb-md-0 mb-2 pr-md-4 d-flex d-md-none topper align-items-center">
                <p class="mb-0 w-100">
                    <span class="fa fa-phone"></span>
                    <span class="text">{{ format_phone($siteSettings->phone) }}</span>
                </p>
            </div>
            <div class="col-sm-12 col-md-2 justify-content-center d-flex mb-md-0 mb-2">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="{{ whatsapp_href($siteSettings->whatsapp) }}" target="_blank"
                            class="d-flex align-items-center justify-content-center">
                            <span class="fa fa-whatsapp"><i class="sr-only">WhatsApp</i></span>
                        </a>
                        <a href="{{ $siteSettings->facebook }}" target="_blank" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 d-flex topper align-items-center text-lg-right justify-content-end">
                <p class="mb-0 register-link d-flex align-items-center justify-content-center">
                    <a href="{{ whatsapp_href($siteSettings->whatsapp) }}" target="_blank"
                        class="btn btn-success d-flex align-items-center justify-content-center w-100">
                        <i class="fa fa-whatsapp" style="font-size: 1.5em;"></i>
                        <span class="ml-2 text-center">{{ format_phone($siteSettings->whatsapp) }}</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="pt-4 pb-4 pb-md-5">
    <div class="container">
        <div class="row d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-md-4 d-flex mb-2 mb-md-0 justify-content-center justify-content-md-start">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <img src="{{ asset('storage/' . $siteSettings->logo_url) }}" alt="{{ $siteSettings->company_name }}"
                        style="width: 268; height: 100px;">
                </a>
            </div>
            <div class="col-md-4 d-none d-md-flex topper mb-md-0 mb-2 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="fa fa-map"></span>
                </div>
                <div class="pr-md-4 pl-md-3 pl-3 text">
                    <p class="con"><span>Contáctanos</span> <span>{{ format_phone($siteSettings->phone) }}</span></p>
                    <p class="con">Llámanos ahora, atención al cliente 24/7</p>
                </div>
            </div>
            <div class="col-md-4 d-none d-md-flex topper mb-md-0 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center"><span
                        class="fa fa-paper-plane"></span>
                </div>
                <div class="text pl-3 pl-md-3">
                    <p class="hr"><span>Nuestra Ubicación</span></p>
                    <p class="con">{{ $siteSettings->address }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
