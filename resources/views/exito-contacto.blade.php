@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Contacto')
@section('content')
<section class="d-flex mx-auto border-0 p-3 justify-content-center align-items-center">
    <div class="col-12 col-md-8">
        <div class="card card-body text-start shadow">
        <!-- Se recibe el nombre y el email que es captado por el controlador
        cuando se hace un POST en el formulario de contacto, el controlador
        tambien redirije a esta ruta -->
        <p class="lead"> 
            Hola <strong> {{ $nombre }}</strong>, qué bueno recibir tu mensaje. 
            <br>Un miembro del equipo de ventas se pondrá en contacto con vos al correo: <strong>{{ $email }}</strong> 
            <br>¡Muchas gracias! 
        </p>
        <a class="btn btn-outline-success mx-4" href="/">Volver al Inicio</a>
    </div>
</div>    

</section>
@endsection