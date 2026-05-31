@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Comercialización')
@section('content')
    <div class="encabezado-terms d-flex align-items-center justify-content-center">
        <h1 class="fw-bold text-white display-3 text-center">TÉRMINOS Y CONDICIONES</h1>
    </div>
    <div class="fondo py-5">
        <div class="container py-4">
            <h2 class="subtitulo-seccion fw-bold text-center mb-5">Términos y Condiciones de Usos y Garantías</h2>
            <div class="row g-4 justify-content-center max-w-5xl mx-auto py-4">
                <!-- Info Card 1 -->
                <div class="h-100 border-0 shadow-sm p-3 card">
                    <div class="card-body text-start">
                        <h3 class="h3 subtitulo-seccion mb-3">Aspectos Generales</h3>
                        <p class="text-secondary mb-0">Al utilizar nuestro sitio web y realizar compras, usted acepta los siguientes términos y condiciones. <br>Le recomendamos leerlos atentamente antes de finalizar cualquier transacción. <br>Este sitio es operado desde la ciudad de Corrientes, Argentina.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center max-w-5xl mx-auto py-4">
                <!-- Info Card 2 -->
                <div class="h-100 border-0 shadow-sm p-3 card">
                    <div class="card-body text-start">
                        <h3 class="subtitulo-seccion mb-3">Precios y Disponibilidad de Stock</h3>
                        <p class="text-secondary mb-0">Todos los precios publicados en la tienda virtual están expresados en Pesos Argentinos (ARS) e incluyen el IVA aplicable.<br>El stock de los productos de pesca, camping e indumentaria es dinámico y se actualiza constantemente.<br>En el caso excepcional de que se concrete una compra de un artículo que se haya quedado sin stock,<br>nos comunicaremos a la brevedad para ofrecerle un producto alternativo de similares características o el reembolso total del dinero.</p>
                    </div>
                </div>
            </div>
            <!-- Info Card 3 -->
            <div class="row g-4 justify-content-center max-w-5xl mx-auto py-4">
                <div class="h-100 border-0 shadow-sm p-3 card">
                    <div class="card-body text-start">
                        <h3 class="subtitulo-seccion mb-3">Medios de Pago y Facturación</h3>
                        <p class="text-secondary mb-0">Aceptamos tarjetas de crédito, tarjetas de débito, Mercado Pago y transferencias bancarias directas.
                            <br/>Las promociones o descuentos por pago en efectivo/transferencia se aplican únicamente sobre el valor de los productos y no sobre
                            <br/>el costo de envío. Emitimos Factura C (o A, según corresponda) la cual será enviada al correo electrónico registrado por el usuario.</p>
                    </div>
                </div>
            </div>
            <!-- Info Card 4 -->
            <div class="row g-4 justify-content-center max-w-5xl mx-auto py-4">
                <div class="h-100 border-0 shadow-sm p-3 card">
                    <div class="card-body text-start">
                        <h3 class="subtitulo-seccion mb-3">Productos</h3>
                        <p class="text-secondary mb-0">Realizamos envíos a todo el territorio de la República Argentina.
                            <br/>Los plazos de entrega estimados (que varían entre 2 y 10 días hábiles dependiendo de la provincia) comienzan a regir 
                            <br/>a partir del momento en que se acredita el pago, no desde la generación del pedido. 
                            <br/>Los envíos gratuitos aplican únicamente a compras que superen el monto mínimo establecido en la web al momento de la compra.</p>
                    </div>
                </div>
            </div>
            <!-- Info Card 5 -->
            <div class="row g-4 justify-content-center max-w-5xl mx-auto py-4">
                <div class="border-0 shadow-sm p-3 card">
                    <div class="card-body text-start">
                        <h3 class="subtitulo-seccion mb-3">Política de Cambios y Devoluciones</h3>
                        <p class="text-secondary mb-0">Conforme a la Ley de Defensa del Consumidor, el cliente tiene un plazo de 30 días corridos desde la recepción 
                            <br>del pedido para solicitar un cambio o la devolución del dinero. 
                            <br>Para que el cambio sea aceptado, el producto debe devolverse sin uso, en perfectas condiciones, 
                            <br>con todas sus etiquetas originales y en su embalaje intacto. 
                            <br>En casos de cambios por talle o arrepentimiento de compra, los costos de envío logísticos correrán por cuenta del cliente.</p>
                    </div>
                </div>
            </div>
            <!-- Info Card 6 -->
            <div class="row g-4 justify-content-center max-w-5xl mx-auto py-4">
                <div class="border-0 shadow-sm p-3 card">
                    <div class="card-body text-start">
                        <h3 class="subtitulo-seccion mb-3">Políticas de Garantía</h3>
                        <p class="text-secondary mb-0">Todos nuestros productos cuentan con garantía legal por defectos de fabricación por un plazo de 6 (seis) meses desde la fecha de facturación. 
                            <ul class="text-secondary mb-0">
                                <li>Cañas y Reeles: La garantía cubre defectos de fábrica en engranajes o armado. NO cubre roturas de tramos o punteras por mal uso, golpes en el transporte personal, sobrecarga de tensión con capturas que superen la capacidad del equipo, o falta de mantenimiento/lubricación.</li>
                                <li>Carpas y Artículos de Camping: La garantía ampara fallas en costuras, cierres y varillas de fábrica. NO aplica a roturas por condiciones climáticas extremas (vientos fuertes, granizo), quemaduras, o negligencia en el armado.</li>
                                <li>Indumentaria: La garantía cubre defectos de confección. NO cubre desgaste por uso normal, manchas o lavado incorrecto.
                                Para validar cualquier garantía, es requisito excluyente presentar el comprobante de compra y enviar evidencia fotográfica del defecto a nuestro canal de soporte.</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection