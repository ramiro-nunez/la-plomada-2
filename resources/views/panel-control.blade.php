@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Panel de Control')
@section('content')
    <div class="bg-dark py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif
        <div class="container py-2">
            <h2 class="subtitulo-seccion fw-bold text-center mb-5">Gestión de Artículos</h2>
            <div class="row justify-content-center text-dark mb-5">
                <div class="col">
                    <a class="btn btn-warning mt-2 w-100" href='/crear-categoria'>Agregar Categoria</a>
                </div>
                <div class="col">
                    <a class="btn btn-warning mt-2 w-100" href='/crear-producto'>Agregar Artículo</a>
                </div>
                <div class="col">
                    <a class="btn btn-warning mt-2 w-100" href='/crear-variante'>Agregar Variante</a>
                </div>
            </div>
            <div style="height: 2px; background: linear-gradient(90deg, transparent, #ff9900, transparent); margin: 30px 0;"></div>
            <div class="row justify-content-center text-dark mb-5">
                <div class="col col-lg-4">
                    <div class="container py-2">
                        <h2 class="subtitulo-seccion fw-bold text-center mb-5">Usuarios Registrados</h2>
                        <a class="btn btn-warning mt-2 w-100" href='/usuarios'>Gestionar Usuarios</a>
                    </div> 
                </div>
                <div class="col col-lg-4">
                    <div class="container py-2">
                        <h2 class="subtitulo-seccion fw-bold text-center mb-5">Consultas de Usuarios</h2>
                        <a class="btn btn-warning mt-2 w-100" href='/consultas'>Consultas</a>
                    </div> 
                </div>
                <div class="col col-lg-4">
                    <div class="container py-2">
                        <h2 class="subtitulo-seccion fw-bold text-center mb-5">Ventas Realizadas</h2>
                        <a class="btn btn-warning mt-2 w-100" href='/ventas'>Gestionar Ventas</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection