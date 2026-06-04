@extends('app')

@section('title', 'Catálogo de Productos')

@section('content')
<div class="container py-5">
    <div class="row">
        
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border border-gray-200">
                <div class="card-body">
                    <h5 class="fw-bold mb-3 text-dark">Categorías</h5>
                    
                    <div class="list-group list-group-flush">
                        <a href="{{ route('catalog.index', request()->except('categoria')) }}" 
                           class="list-group-item list-group-item-action {{ !request('categoria') ? 'active bg-dark border-dark' : '' }}">
                            Todas las categorías
                        </a>
                        
                        @foreach($categorias as $categoria)
                            <a href="{{ route('catalog.index', array_merge(request()->query(), ['categoria' => $categoria->id])) }}" 
                               class="list-group-item list-group-item-action {{ request('categoria') == $categoria->id ? 'active bg-dark border-dark' : '' }}">
                                {{ $categoria->nombre }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            
            <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded shadow-sm border border-gray-200">
                <p class="text-muted mb-0">Mostrando <span class="fw-bold text-dark">{{ $productos->count() }}</span> productos</p>
                
                <form action="{{ route('catalog.index') }}" method="GET" class="d-flex align-items-center gap-2">
                    @if(request('categoria'))
                        <input type="hidden" name="categoria" value="{{ request('categoria') }}">
                    @endif
                    
                    <label for="orden" class="text-nowrap small text-muted mb-0">Ordenar por:</label>
                    <select name="orden" id="orden" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="nuevos" {{ request('orden') == 'nuevos' ? 'selected' : '' }}>Más nuevos</option>
                        <option value="precio_asc" {{ request('orden') == 'precio_asc' ? 'selected' : '' }}>Menor precio</option>
                        <option value="precio_desc" {{ request('orden') == 'precio_desc' ? 'selected' : '' }}>Mayor precio</option>
                        <option value="alfabetico_asc" {{ request('orden') == 'alfabetico_asc' ? 'selected' : '' }}>Nombre (A-Z)</option>
                    </select>
                </form>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($productos as $producto)
            <div class="col-sm-4 mb-4">
                <div class="border text-center product-card bg-white h-100 d-flex flex-column p-1 justify-content-between rounded shadow-sm">
                    
                    <div class="mb-2 overflow-hidden product-img">
                        @if($producto->var_productos->first() && $producto->var_productos->first()->url_img)
                            <img src="{{ asset('img/catalogo/' . $producto->var_productos->first()->url_img) }}" class="w-100 h-100 img-catalogo" alt="{{ $producto->nombre }}">
                        @else
                            <img src="{{ asset('img/catalogo/cana2.jpg') }}" class="w-100 h-100 img-catalogo" alt="{{ $producto->nombre }}">
                        @endif
                    </div>

                    <div class="product-info flex-grow-1 d-flex flex-column justify-content-center mb-3">
                        <span class="text-uppercase text-muted x-small fw-bold mb-1">{{ $producto->categoria->nombre }}</span>
                        
                        <h5 class="fw-semibold fs-6 mb-1">{{ $producto->nombre }}</h5>
                        
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
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-emoji-frown fs-1 text-muted"></i>
                <p class="text-muted mt-2">No encontramos productos en esta categoría.</p>
            </div>
            @endforelse
            </div>

        </div>
    </div>
</div>
@endsection