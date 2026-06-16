@extends('app')

@section('title', $producto->nombre)

@section('content')
<div class="container py-5">
    <a href="{{ route('catalog.index') }}" class="btn btn-secondary mb-4 btn-sm">
        <i class="bi bi-arrow-left"></i> Volver al catálogo
    </a>

    <div class="row g-5">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-3 bg-white text-center">
                @if($producto->var_productos->first() && $producto->var_productos->first()->url_img)
                    <img id="product-image" src="{{ asset('storage/' . $producto->var_productos->first()->url_img) }}" 
                         class="img-fluid rounded" alt="{{ $producto->nombre }}" style="max-height: 450px; object-fit: contain;">
                @else
                    <img id="product-image" src="{{ asset('img/catalogo/cana2.jpg') }}" 
                         class="img-fluid rounded" alt="{{ $producto->nombre }}" style="max-height: 450px; object-fit: contain;">
                @endif
            </div>
        </div>

        <div class="col-md-6">
        <div class="card shadow-sm border-0 p-3 bg-white">
            <span class="text-uppercase text-muted small fw-bold">{{ $producto->categoria->nombre }}</span>
            <h1 class="fw-bold text-dark mt-1 mb-3">{{ $producto->nombre }}</h1>
            
            <div class="mb-4">
                <h3 id="dynamic-price" class="text-success fw-bold display-6">
                    ${{ number_format($producto->var_productos->first()->precio ?? 0, 0, ',', '.') }}
                </h3>
                <span id="stock-badge" class="badge bg-success mt-1 fs-6">
                    Stock disponible: {{ $producto->var_productos->first()->stock ?? 0 }} u.
                </span>
            </div>

            <p class="text-muted mb-4">
                {{ $producto->descripcion ?? 'Equipamiento de alta calidad ideal para tus jornadas de pesca en el Río Paraná. Seleccioná la variante que mejor se adapte a tu necesidad.' }}
            </p>

            <hr class="text-muted my-4">

            <form action="{{ url('/detalle') }}" method="POST" id="cart-form">
                @csrf
                
                <div class="mb-4">
                    <label for="variante_id" class="form-label fw-bold text-dark">Seleccioná la Variedad *</label>
                    <select id="variante_id" name="var_productos_id" class="form-select form-select-lg" required>
                        @foreach($producto->var_productos as $index => $var)
                            <option value="{{ $var->id }}" 
                                    data-precio="{{ $var->precio }}" 
                                    data-stock="{{ $var->stock }}"
                                    data-img="{{ $var->url_img ?? '' }}"
                                    data-fallback="{{ asset('img/catalogo/unnamed.jpg') }}"
                                    {{ $index == 0 ? 'selected' : '' }}>
                                {{ $var->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row g-3 align-items-end mb-4">
                    <div class="col-sm-4">
                        <label for="cantidad" class="form-label fw-bold text-dark">Cantidad</label>
                        <input type="number" id="cantidad" name="cantidad" class="form-control form-select-lg text-center" 
                               value="1" min="1" max="{{ $producto->var_productos->first()->stock ?? 1 }}" required>
                    </div>
                    
                    <div class="col-sm-8">
                        @auth
                            {{-- Evaluamos el stock de la primera variante para el estado inicial del botón --}}
                            @if($producto->var_productos->first()->stock == 0)
                                <button type="button" id="submit-btn" class="btn btn-success btn-lg w-100 fw-bold py-3" disabled>
                                    <i class="bi bi-x-circle me-2"></i> Sin Stock
                                </button>
                            @else
                                <button type="submit" id="submit-btn" class="btn btn-success btn-lg w-100 fw-bold py-3">
                                    <i class="bi bi-cart-plus-fill me-2"></i> Agregar al Carrito
                                </button>
                            @endif
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-warning btn-lg w-100 fw-bold py-3 text-dark shadow-sm">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Iniciá sesión
                            </a>
                        @endguest
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const variantSelect = document.getElementById('variante_id');
        const priceDisplay = document.getElementById('dynamic-price');
        const stockBadge = document.getElementById('stock-badge');
        const quantityInput = document.getElementById('cantidad');
        const productImage = document.getElementById('product-image');
        const submitBtn = document.getElementById('submit-btn');

        function updateVariantDetails() {
            // Obtenemos la opción que el usuario seleccionó en el combo
            const selectedOption = variantSelect.options[variantSelect.selectedIndex];
            
            if (!selectedOption) return;

            // Extraemos los atributos 'data-' que corregimos en el HTML
            const precio = parseFloat(selectedOption.getAttribute('data-precio'));
            const stock = parseInt(selectedOption.getAttribute('data-stock'));
            const img = selectedOption.getAttribute('data-img');

            // 1. Actualizamos el precio formateado a pesos argentinos
            if (priceDisplay && !isNaN(precio)) {
                priceDisplay.textContent = '$' + precio.toLocaleString('es-AR', { minimumFractionDigits: 0 });
            }

            // 2. Actualizamos el stock, el tope del input de cantidad y el estado del botón
            if (stockBadge && quantityInput) {
                if (stock > 0) {
                    stockBadge.textContent = `Stock disponible: ${stock} u.`;
                    stockBadge.className = "badge bg-success mt-2 fs-6";
                    quantityInput.max = stock;
                    if(quantityInput.value > stock || quantityInput.value == 0) {
                        quantityInput.value = 1;
                    }
                    quantityInput.disabled = false;
                    
                    if(submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.type = "submit"; 
                        submitBtn.className = "btn btn-success btn-lg w-100 fw-bold py-3";
                        submitBtn.innerHTML = '<i class="bi bi-cart-plus-fill me-2"></i> Agregar al Carrito';
                    }
                } else {
                    stockBadge.textContent = "Sin Stock momentáneamente";
                    stockBadge.className = "badge bg-danger mt-2 fs-6";
                    quantityInput.max = 0;
                    quantityInput.value = 0;
                    quantityInput.disabled = true;
                    
                    if(submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="bi bi-x-circle me-2"></i> Sin Stock';
                    }
                }
            }

            // 3. Si la variante tiene una imagen propia en var_productos, la cambia en vivo
            if (productImage) {
                const fallbackImg = selectedOption.getAttribute('data-fallback');
                
                if (img && img.trim() !== '') {
                    productImage.src = `/storage/${img}`;
                } else if (fallbackImg) {
                    productImage.src = fallbackImg;
                }
            }
        }

        // Escuchamos el evento 'change' cuando el usuario interactúa con el select
        if (variantSelect) {
            variantSelect.addEventListener('change', updateVariantDetails);
            // Ejecutamos una vez al arrancar para setear los datos de la primera variante
            updateVariantDetails();
        }
    });
    </script>
@endsection