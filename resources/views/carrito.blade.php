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
        <form action="{{route('compra.confirmar')}}" method="POST">
            @csrf
            
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 text-secondary">Items seleccionados</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
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
                                    <input class="form-check-input" type="radio" name="retiro_sucursal" id="envio_domicilio" value="0" checked>
                                    <label class="form-check-label ms-2 d-block" for="envio_domicilio">
                                        <span class="fw-bold d-block">Envío a Domicilio</span>
                                        <small class="text-muted">Entrega en su dirección registrada.</small>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check card-radio p-3 border rounded">
                                    <input class="form-check-input" type="radio" name="retiro_sucursal" id="envio_sucursal" value="1">
                                    <label class="form-check-label ms-2 d-block" for="envio_sucursal">
                                        <span class="fw-bold d-block">Retiro en Sucursal</span>
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

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const radioDomicilio = document.getElementById('envio_domicilio');
                        const radioSucursal = document.getElementById('envio_sucursal');
                        const contenedorDireccion = document.getElementById('contenedor-direccion');
                        const inputsDireccion = contenedorDireccion.querySelectorAll('input');

                        function alternarFormularioEnvio() {
                            if (radioSucursal.checked) {
                                // Ocultar el formulario con clases nativas de Bootstrap
                                contenedorDireccion.classList.add('d-none');
                                // Deshabilitar inputs para que no se envíen datos vacíos al backend
                                inputsDireccion.forEach(input => input.removeAttribute('required'));
                            } else {
                                // Mostrar formulario
                                contenedorDireccion.classList.remove('d-none');
                                // Hacer obligatorios los campos si va a domicilio
                                inputsDireccion.forEach(input => input.setAttribute('required', 'true'));
                            }
                        }

                        // Escuchar los cambios en los radio buttons
                        radioDomicilio.addEventListener('change', alternarFormularioEnvio);
                        radioSucursal.addEventListener('change', alternarFormularioEnvio);
                        
                        // Ejecutar al cargar la página por primera vez
                        alternarFormularioEnvio();
                    });
                </script>

                    <div class="card shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 text-secondary"><i class="bi bi-credit-card"></i> Método de Pago</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-check card-radio p-3 border rounded text-center">
                                        <input class="form-check-input float-none mb-2" type="radio" name="metodo_pago" id="pago_efectivo" value="efectivo" checked>
                                        <label class="form-check-label d-block" for="pago_efectivo">
                                            <span class="fw-bold d-block">Efectivo / Rapipago</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check card-radio p-3 border rounded text-center">
                                        <input class="form-check-input float-none mb-2" type="radio" name="metodo_pago" id="pago_transferencia" value="transferencia">
                                        <label class="form-check-label d-block" for="pago_transferencia">
                                            <span class="fw-bold d-block">Transferencia Bancaria</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check card-radio p-3 border rounded text-center">
                                        <input class="form-check-input float-none mb-2" type="radio" name="metodo_pago" id="pago_online" value="mercado_pago">
                                        <label class="form-check-label d-block" for="pago_online">
                                            <span class="fw-bold d-block">Mercado Pago / Tarjeta</span>
                                        </label>
                                    </div>
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

                            <button type="submit" class="btn btn-success btn-lg w-100 py-3 fw-bold uppercase shadow-sm">
                                <i class="bi bi-check-circle-fill"></i> Confirmar y Comprar
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
    @endif
</div>

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