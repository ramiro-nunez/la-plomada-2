@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Comercialización')
@section('content')
    <div class="encabezado-comercio d-flex align-items-center justify-content-center">
        <h1 class="display-5 fw-bold text-white">COMERCIALIZACIÓN</h1>
    </div>
    <div class="fondo py-5">
        <div class="container py-4">
            <h2 class="subtitulo-seccion fw-bold text-center mb-5">Envíos y Entregas</h2>
            <div class="row g-4 justify-content-center max-w-5xl mx-auto">
                <!-- Info Card 1 -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3 dev-card">
                        <div class="card-body text-center">
                            <h3 class="h4 fw-bold mb-3">
                                <i class="bi bi-truck me-2"></i>
                                Envíos a Todo el País
                            </h3>
                            <p class="text-secondary mb-0">
                                Realizamos envíos a todas las provincias de Argentina a través de los principales servicios de mensajería.</p>
                        </div>
                    </div>
                </div>
                <!-- Info Card 2 -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3 dev-card">
                        <div class="card-body text-center">
                            <h3 class="h4 fw-bold mb-3">
                                <i class="bi bi-clock me-2"></i>
                                Tiempos de Entrega
                            </h3>
                            <p class="text-secondary mb-0">Corrientes y Chaco: 2-4 días hábiles. Resto del país: 5-10 días hábiles según la zona.</p>
                        </div>
                    </div>
                </div>
                <!-- Info Card 3 -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3 dev-card">
                        <div class="card-body text-center">
                            <h3 class="h4 fw-bold mb-3">
                                <i class="bi bi-gift me-2"></i>
                                Envío Gratis
                            </h3>
                            <p class="text-secondary mb-0">En compras superiores a $80.000 el envío es totalmente gratuito a cualquier punto del país.</p>
                        </div>
                    </div>
                </div>
                <!-- Info Card 4 -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-3 dev-card">
                        <div class="card-body text-center">
                            <h3 class="h4 fw-bold mb-3">
                                <i class="bi bi-shop me-2"></i>
                                Retiro en Sucursal
                            </h3>
                            <p class="text-secondary mb-0">Podés retirar tu pedido sin cargo en nuestra sucursal de Corrientes Capital coordinando previamente.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tabla de costos de envio -->
            <div class="row justify-content-center mt-5">
                <div class="col col-lg-8">
                    <div class="card shadow-sm border-0 d-flex flex-column">
                        <div class="card-header text-white py-3 text-center" style="background-color: #2D4030;">
                            <h3 class="h5 fw-bold mb-0">Costos de Envío</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="py-3 px-3 border-bottom-2">Zona</th>
                                            <th class="py-3 px-3 border-bottom-2">Costo</th>
                                            <th class="d-none d-md-table-cell py-3 px-3 border-bottom-2">Tiempo</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-secondary text-nowrap">
                                        <tr>
                                            <td class="py-3 px-3">Corrientes Capital</td>
                                            <td class="py-3 px-3 fw-semibold text-dark">$2.500</td>
                                            <td class="d-none d-md-table-cell py-3 px-3">24-48 horas</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-3">Interior de Corrientes</td>
                                            <td class="py-3 px-3 fw-semibold text-dark">$10.000</td>
                                            <td class="d-none d-md-table-cell py-3 px-3">3-4 días</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-3">Interior (Norte)</td>
                                            <td class="py-3 px-3 fw-semibold text-dark">$15.000</td>
                                            <td class="d-none d-md-table-cell py-3 px-3">5-7 días</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-3">Interior (Centro/Sur)</td>
                                            <td class="py-3 px-3 fw-semibold text-dark">$15.000</td>
                                            <td class="d-none d-md-table-cell py-3 px-3">7-10 días</td>
                                        </tr>
                                        <tr class="table-success">
                                            <td class="py-3 px-3 fw-bold text-dark">Compras +$80.000</td>
                                            <td class="py-3 px-3 fw-bold text-success">GRATIS</td>
                                            <td class="d-none d-md-table-cell py-3 px-3 text-dark">Según zona</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Metodos de pago -->
    <div class="fondo py-4">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold mb-3 subtitulo-seccion">Medios de Pago</h2>
                <p class="text-white fw-bold">Ofrecemos múltiples opciones de pago para tu comodidad y seguridad</p>
            </div>
            
            <div class="row g-4">
                <!-- Pay Method 1 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 bg-light-subtle shadow-sm border p-3 dev-card">
                        <div class="card-body">
                            <i class="bi bi-credit-card fs-1 mb-3 d-inline-block"></i>
                            <h3 class="h6 fw-bold mb-3">Tarjetas de Crédito</h3>
                            <p class="small text-secondary mb-0">Visa, Mastercard, American Express. Hasta 12 cuotas sin interés en productos seleccionados.</p>
                        </div>
                    </div>
                </div>
                <!-- Pay Method 2 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 bg-light-subtle shadow-sm border p-3 dev-card">
                        <div class="card-body">
                            <i class="bi bi-coin fs-1 mb-3 d-inline-block"></i>
                            <h3 class="h6 fw-bold mb-3">Tarjetas de Débito</h3>
                            <p class="small text-secondary mb-0">Todas las tarjetas de débito. Pago en un solo pago con acreditación inmediata.</p>
                        </div>
                    </div>
                </div>
                <!-- Pay Method 3 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 bg-light-subtle shadow-sm border p-3 dev-card">
                        <div class="card-body">
                            <i class="bi bi-bank fs-1 mb-3 d-inline-block"></i>
                            <h3 class="h6 fw-bold mb-3">Transferencia Bancaria</h3>
                            <p class="small text-secondary mb-0">10% de descuento pagando por transferencia o depósito bancario.</p>
                        </div>
                    </div>
                </div>
                <!-- Pay Method 4 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 bg-light-subtle shadow-sm border p-3 dev-card">
                        <div class="card-body">
                            <i class="bi bi-wallet2 fs-1 mb-3 d-inline-block"></i>
                            <h3 class="h6 fw-bold mb-3">Mercado Pago</h3>
                            <p class="small text-secondary mb-0">Todas las opciones de pago de Mercado Pago. Protección al comprador incluida.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Payment Security Alert -->
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="alert alert-success d-flex align-items-start p-4 shadow-sm">
                        <i class="bi bi-shield-lock-fill fs-3 me-3 mt-1"></i>
                        <div>
                            <h4 class="alert-heading h6 fw-bold">Seguridad en los Pagos</h4>
                            <p class="mb-0 small">Todos los pagos son procesados de forma segura con encriptación SSL. No almacenamos datos de tarjetas en nuestros servidores. Tu información está protegida en todo momento.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Politicas -->
    <section class="fondo py-5">
        <div class="container py-4">
            <h2 class="display-6 fw-bold text-center mb-5 subtitulo-seccion">Políticas de Venta</h2>
            <div class="row g-4 justify-content-center">
                <!-- Policy 1 -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm p-4 dev-card">
                        <div class="card-body">
                            <i class="bi bi-arrow-counterclockwise text-success fs-1 mb-4 d-block"></i>
                            <h3 class="h4 fw-bold mb-4">Política de Devoluciones</h3>
                            <ul class="list-unstyled space-y-3">
                                <li class="d-flex align-items-start mb-3">
                                    <i class="bi bi-circle-fill text-success mt-1 me-2" style="font-size: 0.5rem;"></i>
                                    <span class="text-secondary">30 días para devolver productos sin usar</span>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="bi bi-circle-fill text-success mt-1 me-2" style="font-size: 0.5rem;"></i>
                                    <span class="text-secondary">Producto en su embalaje original</span>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="bi bi-circle-fill text-success mt-1 me-2" style="font-size: 0.5rem;"></i>
                                    <span class="text-secondary">Reembolso completo o cambio por otro artículo</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="bi bi-circle-fill text-success mt-1 me-2" style="font-size: 0.5rem;"></i>
                                    <span class="text-secondary">Gastos de envío a cargo del cliente (excepto defectos)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Policy 2 -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm p-4 dev-card">
                        <div class="card-body">
                            <i class="bi bi-box-seam-fill text-success fs-1 mb-4 d-block"></i>
                            <h3 class="h4 fw-bold mb-4">Productos Defectuosos</h3>
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-start mb-3">
                                    <i class="bi bi-circle-fill text-success mt-1 me-2" style="font-size: 0.5rem;"></i>
                                    <span class="text-secondary">Cambio inmediato sin costo adicional</span>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="bi bi-circle-fill text-success mt-1 me-2" style="font-size: 0.5rem;"></i>
                                    <span class="text-secondary">Garantía del fabricante incluida</span>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <i class="bi bi-circle-fill text-success mt-1 me-2" style="font-size: 0.5rem;"></i>
                                    <span class="text-secondary">Envío de reemplazo sin cargo</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="bi bi-circle-fill text-success mt-1 me-2" style="font-size: 0.5rem;"></i>
                                    <span class="text-secondary">Atención prioritaria en casos de defecto</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info de contacto -->
    <section class="py-5 text-white" style="background-color: #2D4030;">
        <div class="container py-4 text-center">
            <div class="mx-auto" style="max-width: 800px;">
                <h2 class="display-6 fw-bold mb-3">¿Tienes dudas sobre tu compra?</h2>
                <p class="lead opacity-75 mb-5">Nuestro equipo está disponible para ayudarte con cualquier consulta</p>
                
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <div class="border border-light rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center gap-2 text-white">
                        <i class="bi bi-telephone-fill"></i> +54 3794 11-1111
                    </div>
                    <div class="border border-light rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center gap-2 text-white">
                        <i class="bi bi-envelope-fill"></i> info@laplomada.com.ar
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection