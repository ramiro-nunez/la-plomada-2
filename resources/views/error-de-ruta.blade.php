@extends('app')

@section('title', 'Página no encontrada')

@section('content')
<div class="container bg-white py-5 my-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="mb-4">
                <i class="bi bi-exclamation-diamond text-warning display-1"></i>
            </div>

            <h1 class="fw-bold text-dark display-4 mb-2">¡Ops!</h1>
            <h3 class="fw-semibold text-secondary mb-4">Parece que picaste en el lugar equivocado</h3>
            
            <p class="text-muted mb-5">
                La ruta a la que estás intentando acceder no existe, fue eliminada o cambió de lugar. 
                No te preocupes, podés volver a la costa segura usando el botón de abajo.
            </p>

            <a href="/" class="btn btn-success btn-lg px-5 fw-bold py-3 shadow-sm">
                <i class="bi bi-house-door-fill me-2"></i> Volver al Inicio
            </a>

        </div>
    </div>
</div>
@endsection