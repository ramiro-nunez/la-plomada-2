@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Consultas de Usuarios')
@section('content')
    <div class="bg-dark py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif
        @if($contactos->isEmpty())
            <div class="card text-center p-5 shadow-sm">
                <div class="card-body">
                    <i class="bi bi-emoji-neutral text-muted" style="font-size: 3rem;"></i>
                    <p class="fs-4 text-muted mt-3">Aún no hay preguntas pendientes</p>
                    <a href="/panel-control" class="btn btn-primary mt-2">Volver al panel de control</a>
                </div>
            </div>
        @else
        <div class="container py-2">
            <div class="card-body p-0">
                <h2 class="subtitulo-seccion fw-bold text-center mb-5">Consultas de Usuarios</h2>
                <div class="accordion shadow-sm" id="accordionCompras">
                    @foreach($contactos as $index => $contacto)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $contacto->id }}">
                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }} bg-white py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $contacto->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $contacto->id }}">    
                                <div class="row w-100 d-flex align-items-center text-dark">
                                    <div class="col-6 col-md-3">
                                        <span class="text-muted small d-block">NRO. CONSULTA</span>
                                        <strong>#{{ $contacto->id }}</strong>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <span class="text-muted small d-block">NOMBRE</span>
                                        <span>{{ $contacto->nombre . ' ' . $contacto->apellido }}hs</span>
                                    </div>
                                    <div class="col-6 col-md-3 mt-2 ms-auto mt-md-0">
                                        <span class="text-muted small d-block">ASUNTO</span>
                                        <strong class="text-primary">{{ $contacto->asunto }}</strong>
                                    </div>
                                </div>
                            </button>
                            </h2>
                            <div id="collapse{{ $contacto->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $contacto->id }}" data-bs-parent="#accordionCompras">
                                <div class="accordion-body bg-light p-4">
                                    <div class="row g-4">
                                        <div class="col-lg-4">
                                            <div class="card border-0 shadow-sm">
                                                <div class="table-responsive">
                                                    <table class="table align-middle mb-0 table-borderless">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th class="ps-3">Mensaje</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="border-bottom">
                                                                <td class="ps-3 py-3">
                                                                    <span class="mb-0">{{ $contacto->mensaje }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="border-bottom">
                                                                <td class="ps-3 py-3 d-flex align-items-center">
                                                                    <small class="text-muted">Email: {{ $contacto->email }}</small>
                                                                    <button class="btn btn-sm ms-auto btn-warning btn-enviar-webhook" type="button">
                                                                        <i class="bi bi-send"></i> Responder
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr class="border-bottom">
                                                                <td class="ps-3 py-3">
                                                                    <small class="text-muted">Telefono: {{ $contacto->telefono }}</small>
                                                                </td>
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
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Script para enviar al webhook -->
    <script src="{{ asset('js/webhook-sender.js') }}"></script>
@endsection