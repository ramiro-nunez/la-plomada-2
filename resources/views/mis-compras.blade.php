@extends('app') <!-- Lo siguiente se extiende del padre app -->
@section('title', 'Mis compras')

@section('content')
<div class="container my-5">
<div class="d-flex align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-bag-check text-success"></i> Mis Compras</h2>
    <span class="badge bg-secondary ms-3 fs-6">{{ $compras->count() }} pedidos</span>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($compras->isEmpty())
    <div class="card text-center p-5 shadow-sm">
        <div class="card-body">
            <i class="bi bi-emoji-neutral text-muted" style="font-size: 3rem;"></i>
            <p class="fs-4 text-muted mt-3">Aún no realizaste ninguna compra.</p>
            <a href="{{ route('catalog.index') }}" class="btn btn-primary mt-2">Explorar Productos</a>
        </div>
    </div>
@else
    <div class="accordion shadow-sm" id="accordionCompras">
        @foreach($compras as $index => $compra)
            <div class="accordion-item">
                
                <h2 class="accordion-header" id="heading{{ $compra->id }}">
                    <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }} bg-white py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $compra->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $compra->id }}">
                        
                        <div class="row w-100 align-items-center text-dark">
                            <div class="col-6 col-md-3">
                                <span class="text-muted small d-block">NRO. PEDIDO</span>
                                <strong>#{{ $compra->id }}</strong>
                            </div>
                            <div class="col-6 col-md-3">
                                <span class="text-muted small d-block">FECHA</span>
                                <span>{{ $compra->created_at->format('d/m/Y H:i') }}hs</span>
                            </div>
                            <div class="col-6 col-md-3 mt-2 mt-md-0">
                                <span class="text-muted small d-block">TOTAL</span>
                                <strong class="text-primary">${{ number_format($compra->total, 2, ',', '.') }}</strong>
                            </div>
                            <div class="col-6 col-md-3 mt-2 mt-md-0 d-flex gap-2">
                                <div>
                                    <span class="text-muted small d-block">ESTADO</span>
                                    @if($compra->estado == 'pendiente')
                                        <span class="badge bg-warning text-dark">Pendiente</span>
                                    @elseif($compra->estado == 'pagado')
                                        <span class="badge bg-success">Pagado</span>
                                    @elseif($compra->estado == 'enviado')
                                        <span class="badge bg-info text-dark">Enviado</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($compra->estado) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </button>
                </h2>

                <div id="collapse{{ $compra->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $compra->id }}" data-bs-parent="#accordionCompras">
                    <div class="accordion-body bg-light p-4">
                        <div class="row g-4">
                            
                            <div class="col-lg-8">
                                <div class="card border-0 shadow-sm">
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0 table-borderless">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th class="ps-3">Producto</th>
                                                    <th class="text-center">Cantidad</th>
                                                    <th class="text-end pe-3">Precio Unitario</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($compra->detalles_compra as $detalle)
                                                    <tr class="border-bottom">
                                                        <td class="ps-3 py-3">
                                                            <h6 class="mb-0 fw-bold">{{ $detalle->varProducto->producto->nombre }}</h6>
                                                            <small class="text-muted">Variante: {{ $detalle->varProducto->descripcion }}</small>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="badge bg-secondary px-2 py-1">x{{ $detalle->cantidad }}</span>
                                                        </td>
                                                        <td class="text-end pe-3 fw-bold text-secondary">
                                                            ${{ number_format($detalle->precio_unitario, 2, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card border-0 shadow-sm h-100 p-3">
                                    <h6 class="fw-bold border-bottom pb-2 mb-3 text-secondary"><i class="bi bi-info-circle"></i> Datos de Operación</h6>
                                    
                                    <p class="mb-2 small">
                                        <strong>Forma de Pago:</strong> <br>
                                        <span class="text-muted">{{ str_replace('_', ' ', ucfirst($compra->metodo_pago)) }}</span>
                                    </p>

                                    <p class="mb-0 small">
                                        <strong>Método de Entrega:</strong> <br>
                                        @if($compra->retiro_sucursal)
                                            <span class="text-success"><i class="bi bi-geo-alt-fill"></i> Retiro en Sucursal</span>
                                            <small class="text-muted d-block">Listo para retirar en 24hs hábiles.</small>
                                        @else
                                            <span class="text-primary"><i class="bi bi-truck"></i> Envío a Domicilio</span>
                                            @if($compra->direccion)
                                                <small class="text-muted d-block mt-1">
                                                    {{ $compra->direccion->calle }} {{ $compra->direccion->altura }} <br>
                                                    {{ $compra->direccion->ciudad }}, {{ $compra->direccion->provincia }} <br>
                                                    <span class="fw-bold">CP:</span> {{ $compra->direccion->codigo_postal }}
                                                </small>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endif
</div>
@endsection