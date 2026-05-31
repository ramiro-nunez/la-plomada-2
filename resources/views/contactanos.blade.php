@extends('app')<!-- Lo siguiente se extiende del padre app -->

@section('title', 'Contacto')
@section('content')
<div class="contacto-page">
    <section class="contacto-hero text-white d-flex align-items-center text-center py-5">
        <div class="container">
            <i class="bi bi-chat-dots display-1 mb-3"></i>
            <h1 class="display-4 fw-bold">CONTACTANOS</h1>
            <p class="lead opacity-90">Estamos aquí para ayudarte a equipar tu próxima aventura.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4 info-card">
                        <i class="bi bi-telephone text-success display-6 mb-3"></i>
                        <h5 class="fw-bold">Teléfono</h5>
                        <a href="tel:+543794123456" class="text-decoration-none text-muted">+54 379 412-3456</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4 info-card">
                        <i class="bi bi-envelope text-success display-6 mb-3"></i>
                        <h5 class="fw-bold">Email</h5>
                        <a href="mailto:info@laplomada.com.ar" class="text-decoration-none text-muted">info@laplomada.com.ar</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4 info-card">
                        <i class="bi bi-geo-alt text-success display-6 mb-3"></i>
                        <h5 class="fw-bold">Dirección</h5>
                        <p class="text-muted small">Junín 1234, Corrientes, Argentina</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4 info-card">
                        <i class="bi bi-clock text-success display-6 mb-3"></i>
                        <h5 class="fw-bold">Horarios</h5>
                        <p class="text-muted small">Lun-Vie: 9:00-19:00 | Sáb: 10:00-14:00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="bg-white rounded-4 shadow p-4 p-md-5">
                        <h3 class="fw-bold mb-4">Envíanos un Mensaje</h3>
                        <form action="{{ url('/contactanos') }}" method="POST">
                            @csrf  <!-- Genera un token que es solicitado por Laravel 
                             buscando evitar ataques maliciosos -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label fw-semibold">Nombre Completo *</label>
                                <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Ingresa tu nombre" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-semibold">Email *</label>
                                    <input id="email" name="email" class="form-control" type="email" placeholder="ejemplo@gmail.com" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telefono" class="form-label fw-semibold">Teléfono</label>
                                    <input type="tel" id="telefono" class="form-control" placeholder="+54 379...">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Asunto *</label>
                                <select class="form-select" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="1">Consulta sobre productos</option>
                                    <option value="2">Seguimiento de pedido</option>
                                    <option value="3">Otros</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Mensaje *</label>
                                <textarea class="form-control" rows="5" placeholder="¿En qué podemos ayudarte?" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg w-100 fw-bold py-3 shadow-sm">
                                <i class="bi bi-send me-2"></i> Enviar Mensaje
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <h2 class="fw-bold mb-4">Preguntas Frecuentes</h2>
                    <div class="accordion accordion-flush shadow-sm rounded-3" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    ¿Hacen envíos al interior?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Sí, enviamos a todo el país a través de diversos transportes desde Corrientes.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    ¿Tienen garantía los productos?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Todos nuestros reels y cañas cuentan con garantía oficial del fabricante.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h2 class="fw-bold mb-3">Ubicación</h2>
                        <div class="rounded-4 overflow-hidden shadow-sm border" style="height: 250px; background: #eee; display: grid; place-items: center;">
                            <div class="text-center">
                                <i class="bi bi-geo-alt-fill text-danger display-4"></i>
                                <p class="mb-0 fw-bold">Corrientes Capital</p>
                                <small class="text-muted">Junín 1234</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection