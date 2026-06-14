@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Consultas de Usuarios')
@section('content')
    <div class="bg-dark py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif
        <div class="container py-4">
            <div class="card-body p-0">
                <h2 class="subtitulo-seccion fw-bold text-center mb-5">Consultas de Usuarios</h2>
                <div class="table-responsive">
                    <table class="table table-dark table-bordered border-warning table-hover table-striped text-center mb-0" id="tablaConsultas">
                        <thead class="table-warning">
                            <tr>
                                <th class="d-none d-md-table-cell py-3 border-bottom-2">Nombre</th>
                                <th class="d-none d-md-table-cell py-3 border-bottom-2">Apellido</th>
                                <th class="d-none d-md-table-cell py-3 border-bottom-2">Email</th>
                                <th class="d-none d-md-table-cell py-3 border-bottom-2">Teléfono</th>
                                <th class="d-none d-md-table-cell py-3 border-bottom-2">Asunto</th>
                                <th class="d-none d-md-table-cell py-3 border-bottom-2">Mensaje</th>
                                <th class="py-3 border-bottom-2">Contestar</th>
                            </tr>
                        </thead>
                        <tbody class="text-secondary text-nowrap">
                            @foreach($contactos as $contacto)
                            <tr class="fila-consulta">
                                <td class="d-none d-md-table-cell py-3" data-nombre>{{ $contacto->nombre }}</td>
                                <td class="d-none d-md-table-cell py-3" data-apellido>{{ $contacto->apellido }}</td>
                                <td class="d-none d-md-table-cell py-3" data-email>{{ $contacto->email }}</td>
                                <td class="d-none d-md-table-cell py-3" data-telefono>{{ $contacto->telefono }}</td>
                                <td class="d-none d-md-table-cell py-3" data-asunto>{{ $contacto->asunto }}</td>
                                <td class="d-none d-md-table-cell py-3" data-mensaje>{{ $contacto->mensaje }}</td>
                                <td class="py-3">
                                    <button class="btn btn-sm btn-warning btn-enviar-webhook" type="button">
                                        <i class="bi bi-send"></i> Enviar
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para enviar al webhook -->
    <script src="{{ asset('js/webhook-sender.js') }}"></script>
@endsection