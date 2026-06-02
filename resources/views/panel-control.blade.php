@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Panel de Control')
@section('content')
    <div class="encabezado-terms d-flex align-items-center justify-content-center">
        <h1 class="fw-bold text-white display-3 text-center">PANEL DE CONTROL</h1>
    </div>
    <div class="fondo py-5">
        <div class="container py-4">
            <h2 class="subtitulo-seccion fw-bold text-center mb-5">Artículos</h2>
            <a class="btn btn-success mt-2 mx-auto" href='/crear-articulo'>Agregar Artículo</a>
            <div class="card-body p-0">
                @if($productos->isEmpty())
                    <p>No hay productos disponibles en este momento.</p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-3 border-bottom-2">nombre</th>
                                <th class="py-3 px-3 border-bottom-2">Costo</th>
                                <th class="d-none d-md-table-cell py-3 px-3 border-bottom-2">stock</th>
                            </tr>
                        </thead>
                        <tbody class="text-secondary text-nowrap">
                            @foreach($productos as $producto)
                            <tr>
                                <td class="py-3 px-3">{{ $producto->name }}</td>
                                <td class="py-3 px-3 fw-semibold text-dark">${{ number_format($producto->price, 2) }}</td>
                                <td class="d-none d-md-table-cell py-3 px-3">{{ $producto->stock }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection