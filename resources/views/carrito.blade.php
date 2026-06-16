@extends('app') <!-- Lo siguiente se extiende del padre app -->
@section('title', 'Carrito')

@section('content')
<div class="container my-5">
    <h2 class="mb-4"><i class="bi bi-cart3"></i> Tu Carrito de Compras</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(!$carrito || $carrito->detalles->isEmpty())
        <div class="card text-center p-5 shadow-sm">
            <div class="card-body">
                <p class="fs-4 text-muted">Tu carrito está vacío actualmente.</p>
                <a href="/productos" class="btn btn-primary btn-lg mt-3">Volver al Catálogo</a>
            </div>
        </div>
    @else
        <form action="{{route('compra.confirmar')}}" method="POST" id="formCheckout">
            @csrf
            
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 text-secondary">Items seleccionados</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive d-none d-md-block">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="ps-4">Producto</th>
                                            <th scope="col" class="text-center">Cantidad</th>
                                            <th scope="col" class="text-end">Precio Unitario</th>
                                            <th scope="col" class="text-end pe-4">Subtotal</th>
                                            <th scope="col" class="text-end pe-4">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $totalAcumulado = 0; @endphp
                                        @foreach($carrito->detalles as $detalle)
                                            @php 
                                                $precioActual = $detalle->varProducto->precio; 
                                                $subtotalItem = $precioActual * $detalle->cantidad;
                                                $totalAcumulado += $subtotalItem;
                                            @endphp
                                            <tr>
                                                <td class="ps-4 py-3">
                                                    <div class="d-flex align-items-center">
                                                        {{-- Si tenés imágenes guardadas, podés usarlas acá --}}
                                                        <div>
                                                            <h6 class="mb-0 fw-bold text-dark">{{ $detalle->varProducto->producto->nombre }}</h6>
                                                            <small class="text-muted">{{ $detalle->varProducto->descripcion }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge bg-secondary px-3 py-2 fs-6">{{ $detalle->cantidad }}</span>
                                                </td>
                                                <td class="text-end text-muted">
                                                    ${{ number_format($precioActual, 2, ',', '.') }}
                                                </td>
                                                <td class="text-end fw-bold text-dark pe-4">
                                                    ${{ number_format($subtotalItem, 2, ',', '.') }}
                                                </td>
                                                <td class="text-end pe-4">
                                                    <a href="{{ route('carrito.eliminar', $detalle->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto del carrito?')">Eliminar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-block d-md-none p-3 bg-light rounded-bottom">
                                @if(!isset($totalAcumulado)) @php $totalAcumulado = 0; @endphp @endif
                                
                                @foreach($carrito->detalles as $detalle)
                                    @php 
                                        $precioActual = $detalle->varProducto->precio; 
                                        $subtotalItem = $precioActual * $detalle->cantidad;
                                        // Evitamos duplicar la suma si por alguna razón se renderizaran ambos bloques
                                        if(!html_entity_decode(trim('d-none d-md-block'))) { $totalAcumulado += $subtotalItem; }
                                    @endphp
                                    
                                    <div class="card border-0 shadow-sm rounded-3 mb-3 p-3 bg-white">
                                        
                                        <div class="d-flex justify-content-between align-items-start gap-2 mb-3">
                                            <div>
                                                <h6 class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">
                                                    {{ $detalle->varProducto->producto->nombre }}
                                                </h6>
                                                <span class="badge bg-light text-secondary border px-2 py-1" style="font-size: 0.75rem;">
                                                    {{ $detalle->varProducto->descripcion }}
                                                </span>
                                            </div>
                                            <a href="{{ route('carrito.eliminar', $detalle->id) }}" 
                                            class="btn btn-outline-danger btn-sm border-0 px-2 py-1" 
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </div>

                                        <hr class="text-muted my-2 opacity-25">

                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            
                                            <div class="d-flex align-items-center gap-2">
                                                <small class="text-muted" style="font-size: 0.8rem;">Cant:</small>
                                                <span class="badge bg-dark px-2.5 py-1.5 fs-6 fw-semibold rounded-2">{{ $detalle->cantidad }}</span>
                                            </div>

                                            <div class="text-end">
                                                <small class="text-muted d-block mb-0" style="font-size: 0.75rem;">
                                                    ${{ number_format($precioActual, 2, ',', '.') }} c/u
                                                </small>
                                                <span class="fw-bold text-success fs-5">
                                                    ${{ number_format($subtotalItem, 2, ',', '.') }}
                                                </span>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 text-secondary"><i class="bi bi-truck"></i> Método de Envío</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="form-check card-radio p-3 border rounded">
                                    <input class="form-check-input ms-2" type="radio" name="retiro_sucursal" id="envio_domicilio" value="0" checked>
                                    <label class="form-check-label ms-2 d-block" for="envio_domicilio">
                                        <span class="fw-bold mx-4 d-block ">Envío a Domicilio</span>
                                        <small class="text-muted">Entrega en su dirección registrada.</small>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check card-radio p-3 border rounded">
                                    <input class="form-check-input ms-2" type="radio" name="retiro_sucursal" id="envio_sucursal" value="1">
                                    <label class="form-check-label ms-2 d-block" for="envio_sucursal">
                                        <span class="fw-bold mx-4 d-block">Retiro en Sucursal</span>
                                        <small class="text-muted">Listo para retirar en 24hs hábiles (Gratis).</small>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="contenedor-direccion" class="border-top pt-4">
                            <h6 class="mb-3 text-dark fw-bold">Datos de Entrega</h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small text-muted">Provincia</label>
                                    <input type="text" name="provincia" class="form-control" placeholder="Ej: Corrientes">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small text-muted">Ciudad / Localidad</label>
                                    <input type="text" name="ciudad" class="form-control" placeholder="Ej: Corrientes Capital">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label small text-muted">Cód. Postal</label>
                                    <input type="text" name="codigo_postal" class="form-control" placeholder="3400">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label small text-muted">Calle</label>
                                    <input type="text" name="calle" class="form-control" placeholder="Ej: Av. Centenario">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small text-muted">Altura / Nro</label>
                                    <input type="text" name="altura" class="form-control" placeholder="Ej: 1420">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                    <div class="card shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 text-secondary"><i class="bi bi-credit-card"></i> Método de Pago</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                            <div class="col-md-4">
                                {{-- Convertimos el label en el contenedor principal --}}
                                <label class="d-flex flex-column align-items-center justify-content-center p-3 border rounded text-center h-100 bg-white" for="pago_efectivo" style="cursor: pointer; transition: all 0.2s;">
                                    <input class="form-check-input mb-2 mt-0" type="radio" name="metodo_pago" id="pago_efectivo" value="efectivo" checked>
                                    <span class="fw-bold text-dark">Efectivo / Rapipago</span>
                                </label>
                            </div>
                            
                            <div class="col-md-4">
                                <label class="d-flex flex-column align-items-center justify-content-center p-3 border rounded text-center h-100 bg-white" for="pago_transferencia" style="cursor: pointer; transition: all 0.2s;">
                                    <input class="form-check-input mb-2 mt-0" type="radio" name="metodo_pago" id="pago_transferencia" value="transferencia">
                                    <span class="fw-bold text-dark">Transferencia Bancaria</span>
                                </label>
                            </div>
                            
                            <div class="col-md-4">
                                <label class="d-flex flex-column align-items-center justify-content-center p-3 border rounded text-center h-100 bg-white" for="pago_online" style="cursor: pointer; transition: all 0.2s;">
                                    <input class="form-select-input mb-2 mt-0" type="radio" name="metodo_pago" id="pago_online" value="mercado_pago">
                                    <span class="fw-bold text-dark">Mercado Pago / Tarjeta</span>
                                </label>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm sticky-top" style="top: 20px; z-index: 10;">
                        <div class="card-header bg-dark text-white py-3">
                            <h5 class="mb-0">Resumen del Pedido</h5>
                        </div>
                        <div class="card-body py-4">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Subtotal Productos</span>
                                <span class="fw-bold text-secondary">${{ number_format($totalAcumulado, 2, ',', '.') }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Costo de Envío</span>
                                <span class="text-success fw-bold">Calculado al procesar</span>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="fs-5 fw-bold text-dark">Total estimado:</span>
                                <span class="fs-4 fw-bold text-primary">${{ number_format($totalAcumulado, 2, ',', '.') }}</span>
                            </div>

                            <button type="button" id="btn-pre-confirmar" class="btn btn-success btn-lg w-100 py-3 fw-bold uppercase shadow-sm">
                                <i class="bi bi-check-circle-fill"></i> Finalizar Compra
                            </button>
                            
                            <div class="text-center mt-3">
                                <a href="/productos" class="text-decoration-none small text-muted">
                                    <i class="bi bi-arrow-left"></i> Seguir sumando productos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-labelledby="modalConfirmacionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">
                    
                    <div class="modal-header bg-dark text-white py-3">
                        <h5 class="modal-title fw-bold" id="modalConfirmacionLabel">
                            <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i> ¿Confirmar tu pedido?
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body p-4 text-center">
                        <p class="fs-5 text-dark mb-2">Estás a un paso de finalizar tu compra en <strong>La Plomada</strong>.</p>
                        <p class="text-muted small">Al confirmar, procesaremos tu pedido con el método de pago y envío seleccionados. Los precios de los productos se congelarán en este instante.</p>
                        
                        <div class="alert alert-secondary py-2 mt-3 mb-0">
                            <span class="text-muted">Total a abonar:</span>
                            <strong class="text-primary fs-4 d-block">${{ number_format($totalAcumulado, 2, ',', '.') }}</strong>
                        </div>
                    </div>
                    
                    <div class="modal-footer bg-light border-top-0 d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary w-25 py-2 fw-bold" data-bs-dismiss="modal">
                            Volver
                        </button>
                        
                        <button type="submit" class="btn btn-success flex-grow-1 py-2 fw-bold shadow-sm" id="btn-finalizar-compra">
                            <i class="bi bi-bag-check-fill"></i> Sí, confirmar compra
                        </button>
                    </div>

                </div>
            </div>
        </div>
    @endif
</div>

<script src="{{ asset('js/webhook-compra.js') }}">
</script>
<style>
    .card-radio {
        transition: all 0.2s ease-in-out;
        cursor: pointer;
    }
    .card-radio:hover {
        background-color: #f8f9fa;
        border-color: #0d6efd !important;
    }
    .card-radio input[type="radio"]:checked + label {
        color: #0d6efd;
    }
</style>
@endsection