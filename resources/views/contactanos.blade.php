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
                        <span class="text-decoration-none text-muted">+54 379 412-3456</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm p-4 info-card">
                        <i class="bi bi-envelope text-success display-6 mb-3"></i>
                        <h5 class="fw-bold">Email</h5>
                        <span class="text-decoration-none text-muted">info@laplomada.com.ar</span>
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
                    @csrf  @auth
                        <p class="text-muted mb-4">
                            Estás navegando como <strong class="text-dark">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</strong> ({{ auth()->user()->email }}).
                        </p>

                        <input type="hidden" name="nombre" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="apellido" value="{{ auth()->user()->apellido }}">
                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">

                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label fw-semibold">Teléfono</label>
                            <input type="number" 
                                id="telefono" 
                                name="telefono" 
                                class="form-control @error('telefono') is-invalid @enderror" 
                                value="{{ old('telefono') }}"
                                pattern="[0-9]*" 
                                placeholder="Ej: 3794123456 (Solo números)">
                            
                            @error('telefono')
                                <div class="invalid-feedback">
                                    El teléfono debe contener solo números, sin espacios ni signos.
                                </div>
                            @enderror
                        </div>
                    @endauth

                    @guest
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-semibold">Nombre *</label>
                            <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label fw-semibold">Apellido *</label>
                            <input id="apellido" name="apellido" class="form-control" type="text" placeholder="Ingresa tu apellido" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-semibold">Email *</label>
                                <input id="email" name="email" class="form-control" type="email" placeholder="ejemplo@gmail.com" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefono" class="form-label fw-semibold">Teléfono</label>
                                <input type="number" 
                                    id="telefono" 
                                    name="telefono" 
                                    class="form-control @error('telefono') is-invalid @enderror" 
                                    value="{{ old('telefono') }}"
                                    pattern="[0-9]*" 
                                    placeholder="Ej: 3794123456 (Solo números)">
                                
                                @error('telefono')
                                    <div class="invalid-feedback">
                                        El teléfono debe contener solo números, sin espacios ni signos.
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endguest

                    <div class="mb-3">
                        <label for="asunto" class="form-label fw-semibold">Asunto *</label>
                        <select id="asunto" name="asunto" class="form-select" required>
                            <option value="">Selecciona una opción</option>
                            <option value="Consulta sobre productos">Consulta sobre productos</option>
                            <option value="Seguimiento de pedido">Seguimiento de pedido</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="mensaje" class="form-label fw-semibold">Mensaje *</label>
                        <textarea id="mensaje" name="mensaje" class="form-control" rows="5" placeholder="¿En qué podemos ayudarte?" required></textarea>
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
                        
                        <div class="rounded-4 overflow-hidden shadow-sm border" style="height: 250px;">
                            
                            <iframe 
                                src="https://maps.google.com/maps?q=Junin%201234,%20Corrientes,%20Argentina&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                                class="w-100 h-100"
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection