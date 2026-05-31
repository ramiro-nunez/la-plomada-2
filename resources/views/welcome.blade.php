@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Inicio')
@section('content')
    <!-- Cuando inicia sesión muestra un msj de alerta guardado en status -->
    @if (session('status'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <!-- Carrousel de bienvenida -->
    <div id="carouselBienvenida" class="carousel slide mx-auto" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner text-center">
        <div class="carousel-item active">
        <img src="{{ asset('img/banners/bann3.jpg') }}" class="d-block w-100" alt="Banner 1">
        </div>
        <div class="carousel-item">
        <img src="{{ asset('img/banners/bann1.jpg') }}" class="d-block w-100" alt="Banner 2">
        </div>
        <div class="carousel-item">
        <img src="{{ asset('img/banners/bann2.jpg') }}" class="d-block w-100" alt="Banner 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBienvenida" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselBienvenida" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <!-- Fin Carrousel -->
    <!-- Productos Destacados -->
    <h2 class="text-center subtitulo-seccion fw-bold py-4">Productos Destacados</h2>
    <!-- Carrousel de Productos Destacados -->
    <div id="carouselProductosDestacados" class="carousel slide mx-auto mb-3" data-bs-ride="carousel" data-bs-interval="4000" >
    <div class="carousel-inner">
        <div class="carousel-item active">
        <div class="row justify-content-center align-items-center g-4">
                <!-- card articulo1 -->
                <div class="col-sm-4">
                    <div class="border text-center product-card">
                        <div class=" mx-auto mb-1 overflow-hidden product-img">
                            <img src="{{ asset('img/catalogo/wader.jpg') }}" class="w-100 h-100 ">
                        </div>
                        <h4 class=" text-success fs-6 fs-sm-3 fw-bold mb-0">$350.000</h4>
                        <h5 class=" fw-semibold fs-6 fs-sm-3 mb-0 pb-2">Wader de Neoprene Waterdog (4mm)</h5>
                    </div>
                </div>
                <!-- card articulo2 -->
                <div class="col-sm-4">
                    <div class="border text-center product-card">
                        <div class="mx-auto mb-1 overflow-hidden product-img">
                            <img src="{{ asset('img/catalogo/reel1.jpg') }}" class="w-100 h-100 ">
                        </div>
                        <h4 class="text-success fs-6 fs-sm-3 fw-bold mb-0">$85.000</h4>
                        <h5 class="fw-semibold fs-6 fs-sm-3 mb-0 pb-2">Reel Frontal Daiwa Sweepfire 4000</h5>
                    </div>
                </div>
                <!-- card articulo3 -->
                <div class="col-sm-4">
                    <div class="border text-center product-card ">
                        <div class="mx-auto mb-1 overflow-hidden product-img">
                            <img src="{{ asset('img/catalogo/cana1.jpg') }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h4 class="text-success fs-6 fs-sm-3 fw-bold mb-0">$145.000</h4>
                        <h5 class="fw-semibold fs-6 fs-sm-3 mb-0 pb-2">Caña Telescópica Shimano FX (3.00m)</h5>
                    </div>
                </div>  
            </div>
        </div>
        <div class="carousel-item">
        <div class="row justify-content-center align-items-center g-4">
                <!-- card articulo4 -->
                <div class="col-sm-4">
                    <div class="border text-center product-card">
                        <div class="mx-auto mb-1 overflow-hidden product-img">
                            <img src="{{ asset('img/catalogo/caja.jpg') }}" class="w-100 h-100 ">
                        </div>
                        <h4 class="text-success fs-6 fs-sm-3 fw-bold mb-0">$65.000</h4>
                        <h5 class="fw-semibold fs-6 fs-sm-3 mb-0 pb-2">Caja de Pesca Plano 3 Bandejas Articuladas</h5>
                    </div>
                </div>
                <!-- card articulo5 -->
                <div class="col-sm-4">
                    <div class="border text-center product-card">
                        <div class="mx-auto mb-1 overflow-hidden product-img">
                            <img src="{{ asset('img/catalogo/señuelo1.jpg') }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        <h4 class="text-success fs-6 fs-sm-3 fw-bold mb-0">$32.000</h4>
                        <h5 class="fw-semibold fs-6 fs-sm-3 mb-0 pb-2">Señuelo Rapala Super Shad Rap (14cm)</h5>
                    </div>
                </div>
                <!-- card articulo6 -->
                <div class="col-sm-4">
                    <div class="border text-center product-card">
                        <div class="mx-auto mb-1 overflow-hidden product-img">
                            <img src="{{ asset('img/catalogo/reel3.jpg') }}" class="w-100 h-100 ">
                        </div>
                        <h4 class="text-success fs-6 fs-sm-3 fw-bold mb-0">$280.000</h4>
                        <h5 class="fw-semibold fs-6 fs-sm-3 mb-0 pb-2">Reel Rotativo Penn Squall Level Wind</h5>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductosDestacados" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselProductosDestacados" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <!-- Fin Carrousel -->
@endsection