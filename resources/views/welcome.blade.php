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
            <a href="{{ route('catalog.index')}}">
                <img src="{{ asset('img/banners/bann3.jpg') }}" class="d-block w-100" alt="Banner 1">
            </a>
        </div>
        <div class="carousel-item">
            <a href="{{ route('catalog.index')}}">
                <img src="{{ asset('img/banners/bann1.jpg') }}" class="d-block w-100" alt="Banner 2">
            </a>
        </div>
        <div class="carousel-item">
            <a href="{{ route('catalog.index')}}">
                <img src="{{ asset('img/banners/bann2.jpg') }}" class="d-block w-100" alt="Banner 3">
            </a>
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
    <h2 class="text-center subtitulo-seccion fw-bold mt-5">Últimos Ingresos</h2>

@if($productosNuevos->isEmpty())
    <div class="text-center py-4">
        <p class="text-muted">Próximamente novedades en equipamiento de pesca.</p>
    </div>
@else
    <div id="carouselProductosNuevos" class="carousel slide mx-auto mb-5" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
            
            {{-- Partimos los 6 productos en tandas de a 3 --}}
            @foreach($productosNuevos->chunk(3) as $index => $tandaProductos)
                
                {{-- La primera tanda de 3 arranca con la clase 'active' --}}
                <div class="carousel-item pb-4 {{ $index === 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row justify-content-center align-items-stretch g-4">
                            
                            {{-- Iteramos los productos dentro de la tanda actual --}}
                            @foreach($tandaProductos as $producto)
                                <div class="col-md-4 col-sm-6 mb-2">
                                    
                                    <div class="border text-center product-card bg-white h-100 d-flex flex-column p-2 justify-content-between rounded shadow-sm">
                                        
                                        <div class="mb-2 overflow-hidden product-img">
                                            @if($producto->var_productos->first() && $producto->var_productos->first()->url_img)
                                                <img src="{{ asset('storage/' . $producto->var_productos->first()->url_img) }}" class="w-100 h-100 img-catalogo" alt="{{ $producto->nombre }}">
                                            @else
                                                <img src="{{ asset('img/catalogo/unnamed.jpg') }}" class="w-100 h-100 img-catalogo" alt="{{ $producto->nombre }}">
                                            @endif
                                        </div>

                                        <div class="product-info flex-grow-1 d-flex flex-column justify-content-center mb-3">
                                            <span class="text-uppercase text-muted x-small fw-bold mb-1">{{ $producto->categoria->nombre }}</span>
                                            
                                            <h5 class="fw-semibold fs-6 mb-1 text-dark">{{ $producto->nombre }}</h5>
                                            
                                            <div class="mt-1">
                                                <span class="text-muted x-small d-block lh-1">Desde</span>
                                                <h4 class="text-success fs-5 fw-bold mb-0">
                                                    ${{ number_format($producto->var_productos_min_precio, 0, ',', '.') }}
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="product-action mt-auto">
                                            <a href="{{ route('detalle', $producto->id) }}" class="btn btn-sm btn-dark w-100 fw-semibold py-2">
                                                <i class="bi bi-eye-fill me-1"></i> Ver detalles
                                            </a>
                                        </div>

                                    </div>
                                    </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductosNuevos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselProductosNuevos" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endif
@endsection